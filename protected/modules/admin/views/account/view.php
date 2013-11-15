<?php
$this->breadcrumbs = array(
    'Accounts' => array('index'),
    $model->id,
);

$this->menu = array(
    array(
        'label' => Yii::t('app', 'Create'),
        'icon' => 'icon-plus',
        'url' => $this->createUrl('create'),
    ),
    array(
        'label' => Yii::t('app', 'Update'),
        'icon' => 'icon-pencil',
        'url' => array('update', 'id' => $model->id),
    ),
    array(
        'label' => 'Delete',
        'icon' => 'icon-trash',
        'url' => '#',
        'linkOptions' => array(
            'submit' => array(
                'delete',
                'id' => $model->id
            ),
            'confirm' => 'Are you sure you want to delete this item?')
    ),
    array(
        'label' => Yii::t('app', 'Manage'),
        'icon' => 'icon-th-list',
        'url' => $this->createUrl('index')
    ),
    array(
        'label' => Yii::t('app', 'Help'),
        'icon' => 'icon-question-sign',
        'url' => array('#myModal'),
        'linkOptions' => array('data-toggle' => 'modal')
    ),
);
?>

<h1>View Account #<?php echo $model->id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'username',
        'email',
        'active',
        'level',
        'create_time',
        'update_time',
    ),
));
?>
