<?php
$this->breadcrumbs=array(
	'Ifaces',
);

$this->menu=array(
	array('label'=>'Create Iface','url'=>array('create')),
	array('label'=>'Manage Iface','url'=>array('admin')),
);
?>

<h1>Ifaces</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
