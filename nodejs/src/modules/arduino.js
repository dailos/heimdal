var moment = require('moment');
arduino = require("firmata")

/* ARduino test*/
/*console.log('blink start ...');

var ledPin = 13;
var vccPin = 12;

var board = new arduino.Board('/dev/ttyACM0', function(err) {
    if (err) {
        console.log(err);
        return;
    }
    console.log('connected');

    console.log('Firmware: ' + board.firmware.name + '-' + board.firmware.version.major + '.' + board.firmware.version.minor);

    var ledOn = true;
    
    board.pinMode(vccPin, board.MODES.OUTPUT);
    board.digitalWrite(vccPin, board.HIGH);

    board.pinMode(ledPin, board.MODES.ANALOG);
	

    setInterval(function(){
    	board.analogRead(ledPin,function(data){console.log(data);});		
    },2500);
});*/
/*FIN TEST*/



Arduino = function(){};

Arduino.prototype.read = function(ifaceId){	
	return {};
};

Arduino.prototype.simRead = function(iface){	
	var i, ports =[];
	for (i in iface.ports){				
		ports.push({
			id : iface.ports[i].id, 
			value : vArduino.ports[iface.ports[i].ref],
			timestamp : moment().format('YYYY-MM-DD HH:mm:ss')
		});		
	}	
	return ports;
};

//SIMULATOR
var vArduino = {
	'state' : 0,
	'ports' :{}
};

setInterval(function(){	
	vArduino.state = (vArduino.state == 3) ? 0 : vArduino.state +1;		
},60000);

setInterval(function(){
	var i, min0, min1;
	min0 = (vArduino.state==1) ? 5: 0;		
	min1 = (vArduino.state==3) ? 5: 0;		
	//iface 0
	for(i = 0; i<4; i++){
		vArduino.ports[i] = min0 + Math.random()*5;
	}
	//iface 1
	for(i = 4; i<8; i++){
		vArduino.ports[i] = min1 + Math.random()*5;
	}
},1000);

exports = module.exports = Arduino;
