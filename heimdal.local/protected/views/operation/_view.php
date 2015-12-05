<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start')); ?>:</b>
	<?php echo CHtml::encode($data->start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end')); ?>:</b>
	<?php echo CHtml::encode($data->end); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alarm')); ?>:</b>
	<?php echo CHtml::encode($data->alarm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iface_id')); ?>:</b>
	<?php echo CHtml::encode($data->iface_id); ?>
	<br />


</div>