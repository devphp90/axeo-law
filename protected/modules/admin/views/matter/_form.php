<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'matter-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
    )
));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php 
$this->widget('bootstrap.widgets.TbTabs', array(
    'type' => 'tabs',
    'tabs' => array(
        array('label' => 'Matter Info', 'content' => $this->renderPartial('_form_basic', array('form' => $form, 'model' => $model), true), 'active' => true),
        array('label' => 'Key Date', 'content' => $this->renderPartial('_form_key_date', array('form' => $form, 'keyDate' => $keyDate), true)),
    )
));
?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>

<?php
Yii::app()->clientScript->registerScript('search', "
$('#Matter_client_id').change(function() {
    id = $(this).val();
    $.ajax({
        url: '" . url('/admin/matter/changeClient') . "',
        type: 'post',
        data: {id: id},
        success: function(data) {
            $('#Matter_office_id').val(data);
        },
    });
});
");
?>
