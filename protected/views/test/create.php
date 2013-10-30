<?php
$this->breadcrumbs=array(
	'Contacts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Contacts', 'url'=>array('index')),
);
?>

<h1>Create new Contact</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>