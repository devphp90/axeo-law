<?php
$this->breadcrumbs = array(
    'Clients' => array('index'),
    'Manage',
);

$this->menu = array(
    array(
        'label' => Yii::t('app', 'Create'),
        'icon' => 'icon-plus',
        'url' => $this->createUrl('create'),
        'linkOptions' => array('id' => 'create-button'),
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
		'linkOptions' => array('onclick' => 'alert("Export to Excel is inactive in demo."); return false;'),
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
	$.fn.yiiGridView.update('clients-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<h1>Manage Roles</h1>

<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'role-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'type' => 'striped bordered',
    'columns' => array(
        array(
            'name' => 'name',
            'value' => 'CHtml::link($data->name, url("/admin/role/update", array("id" => $data->id)))',
            'type' => 'raw',
        ),
        array(
            'name' => 'office_id',
            'type' => 'raw',
            'filter' => Utils::getOfficeOptions(),
            'value' => 'CHtml::link($data->office->name, Yii::app()->createUrl("/admin/office/update", array("id" => $data->office_id)))',
            'visible' => user()->isSuperAdmin(),
        ),
        'id',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
