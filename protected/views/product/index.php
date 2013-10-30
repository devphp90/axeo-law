<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Manage',
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

	array(			'label'=>Yii::t('app','Create'), 
		'url'=>$this->createUrl('create'),		'icon'=>'icon-plus', 			)
	
	/* array(
		'label'=>Yii::t('app','Export(Excel)'), 
		'icon'=>'icon-download', 
		'url'=>$this->createUrl('export',array('type'=>'excel')), 
	),
	array(
		'label'=>Yii::t('app','Help'), 
		'icon'=>'icon-question-sign', 
		'url'=>array('#myModal'), 
		'linkOptions'=>array('data-toggle'=>'modal')
	), */
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('product-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Products</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'product-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
