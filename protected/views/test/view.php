<?php
$this->breadcrumbs=array(
	'Conatcts'=>array('index'),
	'Contact ID #'.$model->id,
);

$this->menu=array(
	array('label'=>'List Conatcts', 'url'=>array('index')),
	array('label'=>'Create Conatct', 'url'=>array('create')),
	array('label'=>'Update Conatct', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Conatct', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Contact Detail</h1>
<hr />
<?php
$this->beginWidget('zii.widgets.CPortlet', array(
	'htmlOptions'=>array(
		'class'=>''
	)
));
$this->widget('bootstrap.widgets.TbMenu', array(
	'type'=>'pills',
	'items'=>array(
		array('label'=>'Create', 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create')),
        array('label'=>'List', 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'), 'linkOptions'=>array()),
		array('label'=>'Update', 'icon'=>'icon-edit', 'url'=>Yii::app()->controller->createUrl('update', array('id'=>$model->id)))
	),
));
$this->endWidget();
?>
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'id',
		array(
			'name'=>'first_name',
			'type'=>'raw',
		),
		array(
			'name'=>'last_name',
			'type'=>'raw',
		),
		array(
			'name'=>'last_name',
			'type'=>'raw',
		),
		array(
			'name'=>'address',
			'type'=>'html'
		)
    ),
)); ?>
