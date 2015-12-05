<div class="subview iface_list">
	<h3><?php echo CHtml::encode($data->name); ?></h3>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('lastactivity')); ?>:</b>
	<?php 
	$timeAgo = Yii::app()->Date->timeAgo($data->lastactivity);
	$this->widget('bootstrap.widgets.TbLabel', array(
    	'type'=>$timeAgo['type'], // 'success', 'warning', 'important', 'info' or 'inverse'
    	'label'=>$timeAgo['text']. " (". CHtml::encode($data->lastactivity) .")",
	)); 
	?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pollingtime')); ?>:</b>
	<?php echo CHtml::encode($data->pollingtime) .' ms'; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detectioncycles')); ?>:</b>
	<?php echo CHtml::encode($data->detectioncycles); ?>
	<br />
	<?php			
		$this->widget('bootstrap.widgets.TbGridView',array(
			'dataProvider'=> new CArrayDataProvider($data->ports),	
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
	?>
</div>
