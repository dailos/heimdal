<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'device-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'reference',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'client',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'location',array('class'=>'span5','maxlength'=>45)); ?>	

	<?php echo $form->textFieldRow($model,'ip',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'token',array('class'=>'span5','maxlength'=>45)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
