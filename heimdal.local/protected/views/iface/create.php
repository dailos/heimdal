<?php
$this->breadcrumbs=array(
	'Ifaces'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Iface','url'=>array('index')),
	array('label'=>'Manage Iface','url'=>array('admin')),
);
?>

<h1>Create Iface</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>