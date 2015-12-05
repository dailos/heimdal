var io = require('socket.io').listen(8080);

Socketio = function(){};

Socketio.prototype.start = function(iface){		
	io.sockets.emit('start', iface);
};

Socketio.prototype.stop = function(iface){		
	io.sockets.emit('stop',iface);
};

Socketio.prototype.send = function(ports){		
	io.sockets.emit('send', ports);
};

io.sockets.on('connection',function(socket){
	socket.on('reset',function(data){
		console.log(config);
	});
});


exports = module.exports = Socketio;