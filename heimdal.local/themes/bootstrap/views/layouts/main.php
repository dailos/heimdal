<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="/assets/dailos/simulator.js"></script>
    <script type="text/javascript" src="/assets/dailos/bars.js"></script>
    <script type="text/javascript" src="/assets/dailos/socketIo.js"></script>
    <script type="text/javascript" src="/assets/dailos/googleChart.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php 

	$isAdmin = (isset(Yii::app()->user->isAdmin) && Yii::app()->user->isAdmin);
	$isGuest = Yii::app()->user->isGuest;			
	$deviceMenu = isset(Yii::app()->user->clientMenu) ? Yii::app()->user->clientMenu : null;

	$this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Inicio', 'url'=>array('/site/index'),'visible'=> !$isAdmin),				
				array('label'=>'Dispositivos', 'url'=>array('/device/index'),'visible'=>$isAdmin),	
				array('label'=>'Dispositivos', 'url'=>array('/client/index'),'visible'=>(!$isAdmin && !$isGuest),'items' => $deviceMenu),					
				array('label'=>'Interfaces', 'url'=>array('/iface/index'),'visible'=>$isAdmin),
				array('label'=>'Puertos', 'url'=>array('/port/index'),'visible'=>$isAdmin),	
				array('label'=>'Usuarios', 'url'=>array('/user/index'),'visible'=>$isAdmin),				
				array('label'=>'Contacto', 'url'=>array('/site/contact'),'visible'=>!$isAdmin),
				array('label'=>'Acceder', 'url'=>array('/site/login'), 'visible'=>$isGuest),
				array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!$isGuest)
            ),
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?>  by Feromadel S.A.<br/>
		All Rights Reserved.<br/>		
		<a href="http://feromadel.com">Feromadel S.A.</a><br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
