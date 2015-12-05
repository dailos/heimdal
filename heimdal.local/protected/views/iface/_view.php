<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastactivity')); ?>:</b>
	<?php echo CHtml::encode($data->lastactivity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('device_id')); ?>:</b>
	<?php echo CHtml::encode($data->device_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pollingtime')); ?>:</b>
	<?php echo CHtml::encode($data->pollingtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detectioncycles')); ?>:</b>
	<?php echo CHtml::encode($data->detectioncycles); ?>
	<br />


</div>