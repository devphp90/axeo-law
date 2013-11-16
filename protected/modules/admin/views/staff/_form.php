<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'staff-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
    ),
));
?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->textFieldRow($model, 'username', array('class' => 'span5', 'maxlength' => 30)); ?>

    <?php echo $form->passwordFieldRow($model, 'password', array('class' => 'span5', 'maxlength' => 32)); ?>

    <?php echo $form->textFieldRow($model, 'email', array('class' => 'span5', 'maxlength' => 100)); ?>

    <?php echo $form->textFieldRow($model, 'active', array('class' => 'span5')); ?>

    <?php

    if (!$model->isNewRecord && $model->level != User::ROLE_SUPER_ADMIN && $model->a_id != 0) {
        echo CHtml::checkBox('isAdmin');
    }
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
