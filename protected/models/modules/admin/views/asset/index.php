<?php
$this->breadcrumbs=array(
	'Assets'=>array('index'),
	'Manage',
);

$this->menu=array(
    array(
        'label'=>Yii::t('app','Create'),
        'icon'=>'icon-plus',
        'url'=>$this->createUrl('create'),
    ),
    array(
        'label'=>Yii::t('app','Search'),
        'icon'=>'icon-search',
        'url'=>'#',
        'linkOptions'=>array('class'=>'search-button')
    ),
    array(
        'label'=>Yii::t('app','Export(Excel)'),
        'icon'=>'icon-download',
        'url'=>$this->createUrl('export',array('type'=>'excel')),
    ),
    array(
        'label'=>Yii::t('app','Help'),
        'icon'=>'icon-question-sign',
        'url'=>array('#myModal'),
        'linkOptions'=>array('data-toggle'=>'modal')
    ),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('asset-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Assets</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'asset-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'item_name',
		'item_part_number',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'header' => 'Action'
		),
	),
)); ?>
