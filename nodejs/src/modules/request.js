var config = require('./../config'),	
	request = require('request'),
	requestStack = [],
	RESTIntervalTime = 30000;

var auth = {
	'user' : config.id,
	'pass' : config.token,
	'sendImmediately' : true
};

Request = function(){};

//Loop for failed API calls
setInterval(function(){
	if(requestStack.length){
		postData = requestStack.shift();
		_pushOperation(postData);
	}
},RESTIntervalTime);

_pushOperation = function(postData){				
	var requestOptions = {			
		uri:  'http://' + config.apiUrl + 'operation' ,
		timeout: 20000,
		auth:auth,		
		json : postData 
	};		
	request.post(requestOptions, function (error, response, body){											
		if(error || response.statusCode != 200){						
			requestStack.push(postData);	
		}
	});
};

Request.prototype.pushOperation = function(postData){	
	_pushOperation(postData);	
};

Request.prototype.register = function(cb){	
	var requestOptions = {	
			timeout: 20000,			
			uri: 'http://' + config.apiUrl + 'register',
			auth:auth
		};	
	request.get(requestOptions, function (error, response, body){				
		if(error){			
			console.log(error);
			cb(null);			
		}else{						
			try {
				cb(JSON.parse(body));
			}catch(err){					
				console.log(err);
				cb(null);									
			}
		}		
	});			
};

exports = module.exports = Request;