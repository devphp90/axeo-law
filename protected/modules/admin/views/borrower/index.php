<?php
$this->breadcrumbs=array(
	'Borrowers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array(
		'label'=>Yii::t('app','Create'),
		'icon'=>'icon-plus',
		'url'=>$this->createUrl('create'),
		'linkOptions' => array('id' => 'create-button'),
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
	$.fn.yiiGridView.update('borrowers-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->widget('ext.eguiders.EGuider', array(
        'id'          => 'first',
        'title'       => 'Start',
        'description' => '<b>Start your work with pushing this button</b>',
        'overlay'     => true,
        'xButton'     => true,
        'show'        => true,
        'autoFocus'   => true,
        'attachTo'	  => '#create-button',
        'position'	  => 3,
    )
);

?>

<h1>Manage Borrowers</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbExtendedGridView',array(
	'id'=>'borrowers-grid',
	'fixedHeader' => true,
	'headerOffset' => 0,
	'type'=>'striped bordered',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name' => 'id',
			'htmlOptions' => array('style' => 'width: 70px'),
			'headerHtmlOptions' => array('style' => 'width: 70px'),
		),
		array(
            'header' => 'NAME',
			'name' => 'name',
			'filter' => $model->getNameFilterOptions(),
            'htmlOptions' => array('style' => 'width: 120px'),
			'headerHtmlOptions' => array('style' => 'width: 120px'),
		),
		array(
			'name' => 'phone1',
			'htmlOptions' => array('style' => 'width: 120px'),
			'headerHtmlOptions' => array('style' => 'width: 120px'),
		),

		array(
			'htmlOptions' => array('style' => 'width: 80px'),
			'headerHtmlOptions' => array('style' => 'width: 80px'),
			'class'=>'bootstrap.widgets.TbButtonColumn'
		),
	),
	'bulkActions' => array(
		'actionButtons' => array(
			array(
				'buttonType' => 'button',
				'type' => 'primary',
				'size' => 'small',
				'label' => 'Delete Selected',
				'click' => 'js:function(checked){
					var values = [];

					if (confirm("Are you sure you want to delete the selected items?")) {
						checked.each(function(){
							values.push($(this).val());
						});
						$.post("/admin/borrower/bulkDelete", {ids: values}, function(){
							$("#borrowers-grid").yiiGridView("update");
						})
					}
				}'
				)
			),
		// if grid doesn't have a checkbox column type, it will attach
		// one and this configuration will be part of it
		'checkBoxColumnConfig' => array(
		    'name' => 'id'
		),
		'align' => 'left',
	),
)); ?>

<script src="<?php echo Yii::app()->request->baseUrl?>/js/colResizable-1.3.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
    $("table").colResizable();
    $("table.items").removeClass("CRZ");
});
</script>