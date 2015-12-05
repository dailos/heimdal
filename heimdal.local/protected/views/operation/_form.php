<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'operation-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'start',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'end',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'alarm',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'iface_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
