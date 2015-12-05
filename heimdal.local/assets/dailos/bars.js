var portSlopes = {};

function initBar(port){
	var slope = (300/port.alarmthreshold);
	var onpixels = 300-(slope * port.onthreshold);
	var offpixels = 300-onpixels;	
	portSlopes[port.id] = slope;
	$('#normal_level_'+port.id).height(onpixels);
	$('#off_level_'+port.id).height(offpixels);
}

function drawBars(data){
  for(var i in data){
      var port = data[i];      
      var y = 400 - (portSlopes[port.id] * port.value.toFixed(2));         
      $('#barcontent_'+port.id).animate({'height':y+'px'},1000); 
      $('#barcontent_'+port.id).html(port.value.toFixed(2));
    }
}