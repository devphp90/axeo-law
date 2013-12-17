<?php
$this->breadcrumbs = array(
    'Appointments' => array('index'),
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
	$.fn.yiiGridView.update('appointment-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Appointments</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn'));  ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'appointment-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'title',
        'name',
        'phone',
        'start_time',
        'end_time',
        'id',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>

<script src="<?php echo Yii::app()->request->baseUrl ?>/js/colResizable-1.3.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function(){
        $("table").colResizable();
        $("table.items").removeClass("CRZ");
    });
</script>
