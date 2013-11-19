<?php
$this->breadcrumbs = array(
    'Documents' => array('index'),
    'Manage',
);

$this->menu = array(
    array(
        'label' => Yii::t('app', 'Create'),
        'icon' => 'icon-plus',
        'url' => $this->createUrl('create'),
    ),
    array(
        'label' => Yii::t('app', 'Search'),
        'icon' => 'icon-search',
        'url' => '#',
        'linkOptions' => array('class' => 'search-button')
    ),
    array(
        'label' => Yii::t('app', 'Export(Excel)'),
        'icon' => 'icon-download',
        'url' => $this->createUrl('export', array('type' => 'excel')),
    ),
    array(
        'label' => Yii::t('app', 'Help'),
        'icon' => 'icon-question-sign',
        'url' => array('#myModal'),
        'linkOptions' => array('data-toggle' => 'modal')
    ),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('document-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Documents</h1>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'document-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'date',
            'type' => 'raw',
            'value' => 'CHtml::link(Yii::app()->dateFormatter->format("MM/d/y",strtotime($data->date)), Yii::app()->createUrl("/admin/document/update", array("id" => $data->id), array("title" => "Edit")))',
            'htmlOptions' => array('style' => 'width: 120px'),
            'headerHtmlOptions' => array('style' => 'width: 120px'),
        ),
        'name',
        'id',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
