<?php
$this->breadcrumbs=array(
	'Contacts'=>array('index'),
	'Contact ID #'.$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Contacts', 'url'=>array('index')),
	array('label'=>'Create Contact', 'url'=>array('create')),
	array('label'=>'View Contact', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update Contact ID # <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>