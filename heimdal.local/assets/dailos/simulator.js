var sim;

/*SIMULATOR*/
function simulator(){
  //SIMULATOR
  var state = 0;

  setInterval(function(){ 
    state = (state == 3) ? 0 : state +1;   
  },60000);

  sim = setInterval(function(){
    var i, min0, min1;
    min0 = (state==1) ? 5: 0;    
    min1 = (state==3) ? 5: 0;    
    ports = []; 
    //iface 0
    for(i = 0; i<4; i++){
      ports.push({
        id : i,
        value: min0 + Math.random()*5
      });
    }
    //iface 1
    for(i = 4; i<8; i++){
      ports.push({
        id : i,
        value: min1 + Math.random()*5
      });
    }
    drawBars(ports);
  },1000);
}

function stopSimulator(){
  clearInterval(sim);
}