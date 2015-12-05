<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref')); ?>:</b>
	<?php echo CHtml::encode($data->ref); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('onthreshold')); ?>:</b>
	<?php echo CHtml::encode($data->onthreshold); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alarmthreshold')); ?>:</b>
	<?php echo CHtml::encode($data->alarmthreshold); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ontransient')); ?>:</b>
	<?php echo CHtml::encode($data->ontransient); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('offtransient')); ?>:</b>
	<?php echo CHtml::encode($data->offtransient); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iface_id')); ?>:</b>
	<?php echo CHtml::encode($data->iface_id); ?>
	<br />

	*/ ?>

</div>