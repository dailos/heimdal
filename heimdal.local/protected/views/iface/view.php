<?php
$this->breadcrumbs=array(
	'Ifaces'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Iface','url'=>array('index')),
	array('label'=>'Create Iface','url'=>array('create')),
	array('label'=>'Update Iface','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Iface','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Iface','url'=>array('admin')),
);
?>

<h1>View Iface #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'lastactivity',
		'device_id',
		'pollingtime',
		'detectioncycles',
	),
)); ?>
