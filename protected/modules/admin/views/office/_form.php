<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'office-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
    ),
));
?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php
    $this->widget('bootstrap.widgets.TbTabs', array(
        'type' => 'tabs', // 'tabs' or 'pills'
        'tabs' => array(
            array('label' => 'Office Detail', 'content' => $this->renderPartial('_form_office', array('form' => $form, 'office' => $office), true), 'active' => true),
            array('label' => 'Admin Profile', 'content' => $this->renderPartial('_form_admin', array('form' => $form, 'model' => $model), true))
        ),
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
