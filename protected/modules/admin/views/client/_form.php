<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'client-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
    )
));
?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php if (user()->isSuperAdmin()) { ?>
        <?php echo $form->dropdownListRow($model, 'office_id', Utils::getOfficeOptions(), array('class' => 'span5', 'empty' => '-- Select Office --')); ?>
    <?php } else { ?>
        <?php echo $form->hiddenField($model, 'office_id'); ?>
    <?php } ?>

    <?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 255)); ?>

    <?php echo $form->textFieldRow($model, 'phone', array('class' => 'span5', 'maxlength' => 20)); ?>

    <?php echo $form->textFieldRow($model, 'email', array('class' => 'span5', 'maxlength' => 255)); ?>

    <?php echo $form->textFieldRow($model, 'skype', array('class' => 'span5', 'maxlength' => 100)); ?>

    <?php echo $form->textFieldRow($model, 'facebook', array('class' => 'span5', 'maxlength' => 150)); ?>
    
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
