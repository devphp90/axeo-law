<?php

$this->breadcrumbs = array(
    'Documents' => array('index'),
    $model->name => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Create Document', 'url' => array('create')),
    array('label' => 'Manage Document', 'url' => array('index')),
    array('label' => 'Guider On', 'url' => array('update', 'id' => $model->id, 'flag' => true)),
);
?>

<?php $this->header_title = 'Document: ' . $model->name . ', ' . Yii::app()->dateFormatter->format("MM/d/y", strtotime($model->date)); ?>

<?php

$this->widget('bootstrap.widgets.TbTabs', array(
    'type' => 'tabs', // 'tabs' or 'pills'
    'tabs' => array(
        array('label' => 'Info', 'content' => $this->renderPartial('_form', array('model' => $model), true), 'active' => true),
        array('label' => 'Video', 'content' => $this->renderPartial('_video', array('video_model' => $video_model, 'uploaded_video' => $uploaded_video), true)),
        array('label' => 'Photos', 'content' => $this->renderPartial('_photos', array('photo_model' => $photo_model, 'uploaded_photo' => $uploaded_photo), true)),
        array('label' => 'Pdf', 'content' => $this->renderPartial('_pdf', array('pdf_model' => $pdf_model, 'uploaded_pdf' => $uploaded_pdf), true)),
    ),
));
?>
<?php

//echo $this->action->id;die();
$this->widget('ext.eguiders.EGuider', array(
    'id' => 'intro',
    'next' => 'position',
    'title' => 'Welcome',
    // 'buttons'		=> array(array('name'=>'Next')),
    'description' => 'here goes description', //$this->renderPartial('_guide_intro',null,true),
    'overlay' => true,
    'xButton' => true,
    'show' => $guider_flag // give true of false
));
?>