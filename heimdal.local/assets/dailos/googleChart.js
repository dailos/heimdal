function initGoogleChart(values, ports){
	google.load('visualization', '1', {'packages':['corechart']});          
	google.setOnLoadCallback(function(){
		var dataTable = new google.visualization.DataTable();
		dataTable.addColumn('datetime', 'hora');			
		for (var i in values){			
			var dateArray = values[i][0].split(/[- :]/);
			values[i][0] =  new Date(dateArray[0], dateArray[1], dateArray[2], dateArray[3], dateArray[4], dateArray[5]);
		}
		console.log(values),
		console.log(ports);
		for (var i in ports){

			dataTable.addColumn('number',ports[i].name);			
		}		
		dataTable.addRows(values);
		var dataView = new google.visualization.DataView(dataTable);		
	  	var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
	  	var options = {        	
	    	width: 960,
	    	height: 640,        	
	    };
	  	chart.draw(dataView, options);      	      	
	});
}