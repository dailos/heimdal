<div class="realtime_iface">
	<h3><?php echo CHtml::encode($data->name); ?></h3>		 	 			
	<div class="clear"></div>
	<?php 
	$this->widget('bootstrap.widgets.TbListView',array(
		'dataProvider'=>new CArrayDataProvider($data->ports),		
		'itemView'=>'_bar_widget',
		'enablePagination' => false,
		'summaryText'=>''	
	));
	?>	
</div>