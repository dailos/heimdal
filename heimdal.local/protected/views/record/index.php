<?php
$this->breadcrumbs=array(
	'Records',
);

$this->menu=array(
	array('label'=>'Create Record','url'=>array('create')),
	array('label'=>'Manage Record','url'=>array('admin')),
);
?>

<h1>Records</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
