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
	    'brand'=>Yii::app()->name,
	    'collapse'=>true, // requires bootstrap-responsive.css
	    'items'=>array(
	        array(
	            'class'=>'bootstrap.widgets.TbMenu',
	            'items'=>array(
	            	array(
	            		'label'=>Yii::t('app','Home'), 
	            		'url'=>array('/site/index')
	            	),
	            	array(
	            		'label'=>Yii::t('app','MyLoanApps'), 
	            		'url'=>array('/project'),
	            		'visible'=>Yii::app()->user->isUser(),
	            	),

	            ),
	        ),

	        array(
	            'class'=>'bootstrap.widgets.TbMenu',
	            'htmlOptions'=>array('class'=>'pull-right'),
	            'items'=>array(
	            	array(
	            		'label'=>'Borrower, '.Yii::app()->user->name,
	            		'url'=>'#',
	            		'items'=> array(
						     array('label'=>'Profile', 'url'=>'#'),
						),
						'visible'=>!Yii::app()->user->isGuest
	            	),
	                array('label'=>Yii::t('app','Logout'), 'url'=>array('/site/logout'),'visible'=>!Yii::app()->user->isGuest),
	                array('label'=>Yii::t('app','Borrower Login'), 'url'=>array('/site/login'),'visible'=>Yii::app()->user->isGuest),
	                array('label'=>Yii::t('app','Lender Login'), 'url'=>array('/backend/default/login'),'visible'=>Yii::app()->user->isGuest),
	                array('label'=>Yii::t('app','Admin Login'), 'url'=>array('/admin/default/login'),'visible'=>Yii::app()->user->isGuest),
	            ),
	        ),
	    ),
	)); ?>
<div class="container" id="page">



	<?php echo $content; ?>

	<hr/>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by <a target="_blank" href="http://axeo.com">AXEO</a>.<br/>
		All Rights Reserved.<br/>
		Runtime:<?php echo Yii::getLogger()->getExecutionTime()?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
