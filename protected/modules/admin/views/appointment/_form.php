<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'appointment-form',
    'enableAjaxValidation' => false,
));
?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    
    <?php if (user()->isSuperAdmin()) { ?>
        <?php echo $form->dropdownListRow($model, 'office_id', Utils::getOfficeOptions(), array('class' => 'span5', 'empty' => '-- Select Office --')); ?>
    <?php } else { ?>
        <?php echo $form->hiddenField($model, 'office_id'); ?>
    <?php } ?>

    <?php echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength' => 32)); ?>

    <?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 32)); ?>

    <?php echo $form->textFieldRow($model, 'phone', array('class' => 'span5', 'maxlength' => 16)); ?>

    <?php echo $form->textAreaRow($model, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>

    <div class="control-group">
        <label for="Appointment_start_time" class="control-label required">Start time <span class="required">*</span></label>
        <div class="controls">
            <?php
            $this->widget('ext.CJuiDateTimePicker.CJuiDateTimePicker', array(
                'model' => $model,
                'attribute' => 'start_time',
                'language' => '',
                'options' => array(
                    'dateFormat' => 'yy-mm-dd', 
                    'autoclose' => true,
                    'todayBtn' => true,
                )
            ));
            echo $form->error($model, 'start_time');
            ?>
        </div>
    </div>
    
    <div class="control-group">
        <label for="Appointment_end_time" class="control-label required">Start time <span class="required">*</span></label>
        <div class="controls">
            <?php
            $this->widget('ext.CJuiDateTimePicker.CJuiDateTimePicker', array(
                'model' => $model,
                'attribute' => 'end_time',
                'language' => '',
                'options' => array(
                    'dateFormat' => 'yy-mm-dd', 
                    'autoclose' => true,
                    'todayBtn' => true,
                )
            ));
            echo $form->error($model, 'end_time');
            ?>
        </div>
    </div>

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
