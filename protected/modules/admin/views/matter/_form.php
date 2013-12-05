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
if (user()->isAdmin())
    $clients = Client::model()->findAll('office_id = :officeId', array(':officeId' => user()->officeId));
else 
    $clients = Client::model()->findAll();
?>

<?php echo $form->dropdownListRow($model, 'client_id', CHtml::listData($clients, 'id', 'name'), array('class' => 'span5', 'empty' => '-- Select Client --')); ?>

<?php echo $form->hiddenField($model, 'office_id'); ?>

<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 255)); ?>

    <?php echo $form->textFieldRow($model, 'phone', array('class' => 'span5', 'maxlength' => 255)); ?>

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
