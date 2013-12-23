<?php
$this->breadcrumbs = array(
    'Matters' => array('index'),
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

<h1>Create Matter</h1>

<?php echo $this->renderPartial('_form', array('model' => $model, 'keyDate' => $keyDate)); ?>