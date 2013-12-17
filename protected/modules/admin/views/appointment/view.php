<?php
$this->breadcrumbs=array(
	'Appointments'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Appointment','url'=>array('index')),
	array('label'=>'Create Appointment','url'=>array('create')),
	array('label'=>'Update Appointment','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Appointment','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Appointment','url'=>array('admin')),
);
?>

<h1>View Appointment #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'name',
		'phone',
		'description',
		'start_time',
		'end_time',
		'created_date',
		'status',
	),
)); ?>
