<div class="bar_wrapper">	
	<div class="bar" id="bar_<php echo $data->id;?>">
		<div class="alarm_level" id="alarm_level_<?php echo $data->id;?>"></div>
		<div class="normal_level" id="normal_level_<?php echo $data->id;?>"></div>
		<div class="off_level" id="off_level_<?php echo $data->id;?>"></div>
		<div class="barcontent" id="barcontent_<?php echo $data->id;?>"></div>
	</div> 	
	<div class="clear"></div>
	<?php echo $data->name; ?>
</div>
<script>initBar(<?php echo json_encode($data->attributes);?>);</script>