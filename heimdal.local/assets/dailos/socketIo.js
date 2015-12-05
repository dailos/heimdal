var socket = null;
function initSocketIo (url){
  socket = io.connect('http://'+url+':8080');
  socket.on('start', function (data) {    	
  
  });

  socket.on('stop', function (iface) {
      	
  });
  socket.on('send', function (data) {   
    drawBars(data);
  });

}

function reset(){
  socket.emit('reset');
}
