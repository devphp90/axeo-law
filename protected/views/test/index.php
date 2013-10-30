<?php
$this->breadcrumbs=array(
	'Contacts',
);

$this->menu=array(
	array('label'=>'Create Contact', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('test-grid', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<h1>Contacts</h1>
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
		array('label'=>'Create', 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
        array('label'=>'List', 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'), 'linkOptions'=>array()),
		array('label'=>'Search', 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button'))
	),
));
$this->endWidget();
?>


<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
    'model'=>$model
)); ?>
</div>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
	'id'=>'test-grid',
    'dataProvider'=>$model->search(),
    'template'=>"{items}",
    'columns'=>array(
        'id',
		'first_name',
		'last_name',
		'email',
		'address',
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => '{view} {update} {delete}',
			'buttons' => array(
				'update' => array(
					'label'=> 'Update',
					'options'=>array(
						'class'=>'btn btn-small update'
					)
				),
				'delete' => array(
					'label'=> 'Delete',
					'options'=>array(
						'class'=>'btn btn-small delete'
					)
				)
			),
            'htmlOptions'=>array('style'=>'width: 100px'),
        )
    ),
)); ?>
