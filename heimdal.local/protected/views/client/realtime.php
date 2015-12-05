<?php $device = Yii::app()->session['device_'.$deviceId]; ?>
<div class="view">	
	<h2 class="device_title"><?php echo CHtml::encode($device->data[0]->reference) .' ('. 
					CHtml::encode($device->data[0]['location']) .')' ?></h2>	
	<?php 
	$this->widget('bootstrap.widgets.TbButtonGroup', array(
	    'type' => 'primary',
	    'toggle' => 'radio', // 'checkbox' or 'radio'    
	    'htmlOptions' => array('class' => 'device_buttons'), 
	    'buttons' => array(
	        array('label'=>'Estado', 'url' => Yii::app()->urlManager->createUrl('client/status',array('id'=>$deviceId))),
	        array('label'=>'Historial', 'url' =>Yii::app()->urlManager->createUrl('client/operation',array('id'=>$deviceId))),
	        array('label'=>'Tiempo real','url' =>'#', 'active' =>true, 'type' =>'danger'),
	    )
	)); 					
 	?>
 	<div class="clear"></div> 	
 	<?php 
	$this->widget('bootstrap.widgets.TbListView',array(
		'dataProvider'=>new CArrayDataProvider($device->data[0]->ifaces),		
		'itemView'=>'_realtime_view',
		'enablePagination' => false,
		'summaryText'=>''	
	));
	?>	
</div>

<script src="http://<?php  echo $device->data[0]->ip ?>:8080/socket.io/socket.io.js"></script>
<script>initSocketIo('<?php  echo $device->data[0]->ip ?>');</script>
<!--<script>simulator();</script>-->
<div style="width:10px;height:10px;border:1px solid black;" onclick="reset();"></div>