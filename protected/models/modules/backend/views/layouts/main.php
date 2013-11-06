<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<?php
	$this->widget('bootstrap.widgets.TbNavbar', array(
	    'fixed'=>true,
	    'brand'=>Yii::app()->name.' Backend',
	    'collapse'=>true, // requires bootstrap-responsive.css
	    'items'=>array(
	        array(
	            'class'=>'bootstrap.widgets.TbMenu',
	            'items'=>array(
	            array(
	            		'label'=>Yii::t('app','Home'), 
	            		'url'=>array('/backend/default/index')
	            	),
	                array(
	                	'label'=>Yii::t('app','User'), 
	                	'url'=>array('/backend/user'),
	                	'visible'=>Yii::app()->user->isAccount(),
	                ),
	                 array(
	                	'label'=>Yii::t('app','Role'), 
	                	'url'=>array('/backend/role'),
	                	'visible'=>Yii::app()->user->isAccount(),
	                ),
	                array(
	                	'label'=>Yii::t('app','UI Demo'), 
	                	'url'=>array('/backend/default/uidemo'),
	                	'visiable'=>Yii::app()->user->isAccount(),
	                ),
	            ),
	        ),

	        array(
	            'class'=>'bootstrap.widgets.TbMenu',
	            'htmlOptions'=>array('class'=>'pull-right'),
	            'items'=>array(
	                array('label'=>Yii::t('app','Logout'), 'url'=>array('/site/logout'),'visible'=>!Yii::app()->user->isGuest),
	                array('label'=>Yii::t('app','Login'), 'url'=>array('/site/login'),'visible'=>Yii::app()->user->isGuest),
	            ),
	        ),
	    ),
	)); ?>
<div class="container" id="page">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(

					'links'=>$this->breadcrumbs,
					'homeLink'=>CHtml::link('Home',$this->homeUrl),
					
			
		)); ?>
	<?php endif?>


	<?php echo $content; ?>

	<hr/>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		Runtime:<?php echo Yii::getLogger()->getExecutionTime()?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
