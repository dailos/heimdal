<?php
$this->breadcrumbs=array(
	'Ports',
);

$this->menu=array(
	array('label'=>'Create Port','url'=>array('create')),
	array('label'=>'Manage Port','url'=>array('admin')),
);
?>

<h1>Ports</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
