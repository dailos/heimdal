<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timestamp')); ?>:</b>
	<?php echo CHtml::encode($data->timestamp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
	<?php echo CHtml::encode($data->value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('port_id')); ?>:</b>
	<?php echo CHtml::encode($data->port_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('operation_id')); ?>:</b>
	<?php echo CHtml::encode($data->operation_id); ?>
	<br />


</div>