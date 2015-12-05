<?php
$this->breadcrumbs=array(
	'Ports'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Port','url'=>array('index')),
	array('label'=>'Create Port','url'=>array('create')),
	array('label'=>'View Port','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Port','url'=>array('admin')),
);
?>

<h1>Update Port <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>