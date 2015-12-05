<?php
$this->breadcrumbs=array(
	'Ports'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Port','url'=>array('index')),
	array('label'=>'Create Port','url'=>array('create')),
	array('label'=>'Update Port','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Port','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Port','url'=>array('admin')),
);
?>

<h1>View Port #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'ref',
		'type',
		'onthreshold',
		'alarmthreshold',
		'ontransient',
		'offtransient',
		'iface_id',
	),
)); ?>
