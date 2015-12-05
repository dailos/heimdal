<?php 	
$device = Yii::app()->session['device_'.$operation->iface->device_id];
$this->widget('bootstrap.widgets.TbButton', array(
	'label'=>'Volver',
	'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	'size'=>'small', // null, 'large', 'small' or 'mini'
	'url' =>Yii::app()->urlManager->createUrl('client/operation',array('id'=>$operation->iface->device_id))
)); 
?>
<div class="view">	
	<h2 class="device_title"><?php echo CHtml::encode($operation->iface->name);  ?></h2>		
	<?php 	
	
	if($operation->nextId){
		$this->widget('bootstrap.widgets.TbButton', array(
			'label'=>'Siguiente',
			'url' =>Yii::app()->urlManager->createUrl('client/displayOperation',array('id' =>$operation->nextId)),
			'htmlOptions' => array('class' => 'device_buttons'),
			'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			'size'=>'small', // null, 'large', 'small' or 'mini'		
		)); 
	}
	if($operation->prevId){
		$this->widget('bootstrap.widgets.TbButton', array(
			'label'=>'Anterior',
			'url' => Yii::app()->urlManager->createUrl('client/displayOperation',array('id' =>$operation->prevId)),
			'htmlOptions' => array('class' => 'device_buttons'),
			'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			'size'=>'small', // null, 'large', 'small' or 'mini'
		)); 
	}	
	

	$this->widget('bootstrap.widgets.TbDetailView', array(
    	'data'=> $operation,
    	'attributes'=>array(
        	array('name'=>'duration', 'label'=>'Duración'),
        	array('name'=>'start', 'label'=>'Inicio'),
        	array('name'=>'end', 'label'=>'Final'),    
    )));

	if($operation->alarm){
		$this->widget('bootstrap.widgets.TbLabel', array(
    		'type'=>'important', // 'success', 'warning', 'important', 'info' or 'inverse'
    		'label'=>'Atención! Se ha producido un fallo en esta operación',
		)); 
	}
	?>
	<div id="chart_div"></div>

	<?php				
	foreach ($device->data[0]->ifaces as $sIface ){
		if($sIface->id == $operation->iface->id){
			$iface = $sIface;
			break;
		}
	}
	
	$this->widget('bootstrap.widgets.TbGridView',array(
		'dataProvider'=> new CArrayDataProvider($iface->ports),	
		'type'=>'striped bordered condensed',
		'columns' => array(
						'name:text:Nombre' ,
						'ref:text:Puerto',
						'type:text:Tipo', 
						'onthreshold:number:Nivel de encendido',
						'alarmthreshold:number:Nivel de alarma', 
						'ontransient:number:Transitorio de encendido',
						'offtransient:number:Transitorio de apagado'
					),
		'enablePagination' => false,
		'summaryText'=>''
	));

	foreach($operation->iface->ports as $port){
		$jsonports[] =  $port->attributes;
	}	
?>	

</div>
<script type="text/javascript"> 
	initGoogleChart(<?php echo json_encode($values, JSON_NUMERIC_CHECK ) .','.
 					json_encode($jsonports); ?>) 
</script>