<?php
$this->breadcrumbs=array(
	'Documents'=>array('index'),
	$model->name,
);

$this->menu=array(
	array(	
		'label'=>Yii::t('app','Create'), 
		'icon'=>'icon-plus', 
		'url'=>$this->createUrl('create'),
	),
	array(	
		'label'=>Yii::t('app','Update'), 
		'icon'=>'icon-pencil', 
		'url'=>array('update','id'=>$model->id),
	),
	array(
		'label'=>'Delete',
		'icon'=>'icon-trash',
		'url'=>'#',
		'linkOptions'=>array(
			'submit'=>array(
				'delete',
				'id'=>$model->id			),
		'confirm'=>'Are you sure you want to delete this item?')
	),
	array(
		'label'=>Yii::t('app','Manage'), 
		'icon'=>'icon-th-list', 
		'url'=>$this->createUrl('index')
	),
);
?>

<h1>View Document #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		/* array(
			'label'=>'Content',
			'type'=>'raw',
			'value'=>'<a href="'.Yii::app()->baseUrl.'/uploads/documents/'.$model->content.'" target="_blank">'.$model->content.'</a>',
		), */
		array(
			'label'=>'Download',
			'type'=>'raw',
			'value'=>'<a href="'.CController::createUrl('document/download',array('id'=>$model->id)).'">Download</a>',
		),
		array(
			'label'=>'Content',
			'type'=>'raw',
			'value'=>Document::model()->getContents($model),
		),
	),
)); ?>
