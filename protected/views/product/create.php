<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Create',
);

$this->menu=array(
	array(
		'label'=>Yii::t('app','List'), 
		'icon'=>'icon-th-list', 
		'url'=>$this->createUrl('index')
	),
	
	array(
		'label'=>Yii::t('app','Search'), 
		'icon'=>'icon-search', 
		'url'=>'#', 
		'linkOptions'=>array('class'=>'search-button')
	),

	/* array(	
		'label'=>Yii::t('app','Create'), 
		'url'=>$this->createUrl('create'),
		'icon'=>'icon-plus', 
		
	) */
);
?>

<h1>Create Product</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>