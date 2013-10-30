<?php
$this->breadcrumbs=array(
	'Customers'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array(	
		'label'=>Yii::t('app','Create'), 
		'icon'=>'icon-plus', 
		'url'=>$this->createUrl('create'),
		'visible'=>Yii::app()->user->userAuth('create'),
	),
	array(	
		'label'=>Yii::t('app','View'), 
		'icon'=>'icon-eye-open', 
		'url'=>array('view','id'=>$model->id),
	),
	array(
		'label'=>Yii::t('app','Manage'), 
		'icon'=>'icon-th-list', 
		'url'=>$this->createUrl('index')
	),


);
?>

<h1>Update Customer <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>