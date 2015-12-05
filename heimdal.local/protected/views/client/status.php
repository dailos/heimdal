<div class="view">	
	<h2 class="device_title"><?php echo CHtml::encode($dataProvider->data[0]->reference) .' ('.  CHtml::encode($dataProvider->data[0]['location']) .')' ?></h2>	
	<?php 
	$this->widget('bootstrap.widgets.TbButtonGroup', array(
	    'type' => 'primary',
	    'toggle' => 'radio', // 'checkbox' or 'radio'    
	    'htmlOptions' => array('class' => 'device_buttons'), 
	    'buttons' => array(
	        array('label'=>'Estado', 'url' => '#', 'active' =>true, 'type' =>'danger'),
	        array('label'=>'Historial', 'url' =>Yii::app()->urlManager->createUrl('client/operation',
	        					array('id'=> $dataProvider->data[0]->id))),
	        array('label'=>'Tiempo real','url' =>Yii::app()->urlManager->createUrl('client/realtime',
	        					array('id'=> $dataProvider->data[0]->id))),
	    )
	)); 
	
	$dataProvider = new CArrayDataProvider($dataProvider->data[0]->ifaces);		
	$this->widget('bootstrap.widgets.TbListView',array(
		'dataProvider'=>$dataProvider,		
		'itemView'=>'_iface_view',
		'enablePagination' => false,
		'summaryText'=>''	
	));
	?>
</div>