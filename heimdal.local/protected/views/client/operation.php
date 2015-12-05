<?php
$device = Yii::app()->session['device_'.$deviceId];
?>
<div class="view">		
	<h2 class="device_title"><?php echo CHtml::encode($device->data[0]->reference) .' ('. 
						 CHtml::encode($device->data[0]->location) .')' ?></h2>	
	<?php 
	$this->widget('bootstrap.widgets.TbButtonGroup', array(
	    'type' => 'primary',
	    'toggle' => 'radio', // 'checkbox' or 'radio'    
	    'htmlOptions' => array('class' => 'device_buttons'), 
	    'buttons' => array(
	        array('label'=>'Estado', 'url' => Yii::app()->urlManager->createUrl('client/status',
	        					array('id' =>$deviceId))),
	        array('label'=>'Historial', 'url' => '#' , 'active' =>true, 'type' =>'danger'),
	        array('label'=>'Tiempo real','url' =>Yii::app()->urlManager->createUrl('client/realtime',
	        					array('id'=> $deviceId))),
	    )
	)); 	

			
	$this->widget('bootstrap.widgets.TbGridView',array(
		'dataProvider'=> $dataProvider,	
		'type'=>'striped bordered condensed',
		'htmlOptions'=>array('style'=>'cursor: pointer;'),
    	'selectionChanged'=>"function(id){window.location='" . 
    				Yii::app()->urlManager->createUrl('client/displayOperation', array('id'=>'')) . 
    				"' + $.fn.yiiGridView.getSelection(id);}",    	
		'columns' => array(
				'iface.name:text:Interface', 	
				'duration:text:Duración',
				array('name' => 'start', 'header' => 'Inicio'),
				array('name' => 'end', 'header' => 'Final'),
				array('name' => 'alarm', 'header' => 'Estado', 'value' => '$data->alarmMessage'),		    			
		),
		'enablePagination' => true,
		'summaryText'=>''
	));
	?>	
</div>