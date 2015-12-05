var config = require('./config'),		
	Request = require('./modules/request'),
	Socketio = require('./modules/socket_io'),
	Arduino = require('./modules/arduino'),
	moment = require('moment'),
	fs = require('fs'); 
var request = new Request(),
	socketio = new Socketio(),
	arduino = new Arduino();

//Init
init();

function init(){	
	//First load form file	
	fs.readFile(config.ifaceFile, function(error,data){			
		if(!error){		
			try{	
				config.ifaces= JSON.parse(data);				
			}catch(err){
				console.log("JSON Error while reading the iface file");
				console.log(err);
			}	
		}else{			
			console.log(error);
		}			
		//then get interfaces from remote server			
		request.register(function(ifaces){ //Success					
				if(ifaces){
					config.ifaces = ifaces;		
					fs.writeFile(config.ifaceFile,JSON.stringify(ifaces));	
				}
				if(config.ifaces){					
					main();			
				}				
			}			
		);		
	});
}

//Main polling
function main(){			
	for (var i in config.ifaces){							
		process(config.ifaces[i]);		
	}			
}

function process(iface){	
	iface.active = false;
	iface.onCounter = 0;
	iface.offCounter = 0;	
	iface.pollingInterval = setInterval(function(){				
		var isWorking, i, j, k;	
		var ports = arduino.simRead(iface);						
		if (iface.active){//iface is active						
			isWorking = false;						
			//Send with soket.io
			socketio.send(ports);						
			
			for(i in ports){				
				//Check for Alarm				
				iface.operation.records.push(ports[i]);				
				if(ports[i].value > iface.ports[i].alarmthreshold){
					iface.operation.alarm =true;
					isWorking = true;					
				}
				if(ports[i].value > iface.ports[i].onthreshold){						
					isWorking = true;					
				}								
			}	

			iface.offCounter = isWorking ? 0 : iface.offCounter +1; 
							
			// Check for Stop operation
			if(iface.offCounter == iface.detectioncycles){
				iface.operation.end = moment().format('YYYY-MM-DD HH:mm:ss');			
				request.pushOperation(iface.operation);
				iface.operation = null;
				iface.offCounter = 0;
				iface.active = false;
				//socket io
				socketio.stop(iface);
			}				
		}else{//iface is idle
			isWorking = false;
			for(j in ports){	
				if(ports[j].value > iface.ports[j].onthreshold){											
					isWorking = true;
					break;
				}
			}	

			iface.onCounter = isWorking ? iface.onCounter + 1 : 0;					
			//Start operation
			if(iface.onCounter == iface.detectioncycles){
				iface.active = true;
				iface.onCounter = 0;
				iface.operation = {
					iface_id: iface.id,
					start: moment().format('YYYY-MM-DD HH:mm:ss'),
					alarm: false ,
					records : []
				};							
				//Send with soket.io
				socketio.start(iface);	
			}
		}											
	}, parseInt(iface.pollingtime));
}

function resetConf(){
	console.log("yiiiyaa");
}