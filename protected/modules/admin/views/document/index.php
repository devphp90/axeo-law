<?php
$this->breadcrumbs=array(
	'Documents'=>array('index'),
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
		'linkOptions' => array('onclick' => 'alert("Export to Excel is inactive in demo."); return false;'),
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
	$.fn.yiiGridView.update('document-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Documents</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'document-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type' => 'striped bordered',
	'columns'=>array(
		array(
			'name'=>'name',
			'type'=>'raw',
			'value'=>array($this,'getNameLabel'),
		),
		array('name'=>'size'),
		'type',
		'created_date',
		'description',
		'content'=> array(						
						'type'=>'raw',						
						'value' => 'CHtml::link( $data->content,						
									   Yii::app()->baseUrl.\'/uploads/documents/\'.$data->content,						
									   array("title"=>"View File","target"=>"_blank") )',						
						'header' => 'Content'						
					),
		array(						
			'type'=>'raw',						
			'value' => 'CHtml::link("Download",						
						   Yii::app()->baseUrl.\'/admin/document/download/id/\'.$data->id,						
						   array("title"=>"View File","target"=>"_blank") )',						
			'header' => 'Download'						
		),
		'id',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
