<?php
$this->breadcrumbs = array(
    'Staffs' => array('index'),
    'Create',
);

$this->menu = array(
    array(
        'label' => Yii::t('app', 'Manage'),
        'icon' => 'icon-th-list',
        'url' => $this->createUrl('index')
    ),
);
?>

<h1>Create Office</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>