<?php
$this->breadcrumbs=array(
	'Ifaces'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Iface','url'=>array('index')),
	array('label'=>'Create Iface','url'=>array('create')),
	array('label'=>'View Iface','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Iface','url'=>array('admin')),
);
?>

<h1>Update Iface <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>