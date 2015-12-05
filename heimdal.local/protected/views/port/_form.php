<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'port-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'ref',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'type',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'onthreshold',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'alarmthreshold',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ontransient',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'offtransient',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'iface_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
