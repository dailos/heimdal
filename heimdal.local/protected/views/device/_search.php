<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'reference',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'client',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'location',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'ip',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'token',array('class'=>'span5','maxlength'=>45)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
