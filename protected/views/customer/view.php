<?php
$this->breadcrumbs=array(
	'Customers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array(	
		'label'=>Yii::t('app','Create'), 
		'icon'=>'icon-plus', 
		'url'=>$this->createUrl('create'),
		'visible'=>Yii::app()->user->userAuth('create'),
	),
	array(	
		'label'=>Yii::t('app','Update'), 
		'icon'=>'icon-pencil', 
		'url'=>array('update','id'=>$model->id),
		'visible'=>Yii::app()->user->userAuth('update'),
	),
	array(
		'label'=>'Delete',
		'icon'=>'icon-trash',
		'url'=>'#',
		'linkOptions'=>array(
			'submit'=>array(
				'delete',
				'id'=>$model->id			),
		'confirm'=>'Are you sure you want to delete this item?'),
		'visible'=>Yii::app()->user->userAuth('delete'),
	),
	array(
		'label'=>Yii::t('app','Manage'), 
		'icon'=>'icon-th-list', 
		'url'=>$this->createUrl('index')
	),
);
?>

<h1>View Customer #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'u_id',
		'name',
		'email',
		'phone',
	),
)); ?>
