<?php

$this->breadcrumbs=array(
	'MyLoanApp'=>array('index'),
	'Manage',
);

$this->menu=array(
	array(	
		'label'=>Yii::t('app','Create'), 
		'icon'=>'icon-plus', 
		'url'=>$this->createUrl('create'),
		'visible'=>Yii::app()->user->userAuth('create'),
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
	$.fn.yiiGridView.update('project-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage MyLoanApp</h1>
<?php
$this->widget('bootstrap.widgets.TbWizard', array(
	'type' => 'tabs', // 'tabs' or 'pills'
	'tabs' => array(
		array(
			'label' => 'Borrower Info', 
			'content'=>$this->renderPartial('tabs/_borrowerinfo',compact('supplierModel','model'),1),
			'active' => true,
		),
		array('label' => 'Credit Card', 'content' => 'Home Content'),
		array('label' => 'Digital Signature', 'content' => 'Profile Content'),
		array('label' => '1003 Report', 'content' => 'Messages Content'),
		array('label' => 'Credit Report', 'content' => 'Messages Content'),
		array('label' => 'Escrow', 'content' => 'Messages Content'),
		array('label' => 'Title', 'content' => 'Messages Content'),
		array('label' => 'Appraisal', 'content' => 'Messages Content'),
		array('label' => 'Bank Statements', 'content' => 'Messages Content'),
		array('label' => 'Taxes', 'content' => 'Messages Content'),
	),
));
?>
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<!--
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>
-->

<?php/*
 $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'project-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'header'=>'Customer',
			'name'=>'c_id',
			'value'=>'$data->customer->name',
		),
		'name',
		'description',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}'.(Yii::app()->user->userAuth('update')?'{update}':'').(Yii::app()->user->userAuth('delete')?'{delete}':''),
		),
	),
));
*/ ?>
