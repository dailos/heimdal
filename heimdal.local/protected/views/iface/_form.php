<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'iface-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'lastactivity',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'device_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'pollingtime',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'detectioncycles',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
