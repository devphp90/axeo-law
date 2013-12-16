<?php
/**
 * @var TbActiveForm $form
 * @var Event $model
 */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'event_form',
    'type' => 'horizontal',
    'action' => isset($action) ? $action :  url('/admin/calendar/add'),
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => false,
        'afterValidate' => "js:function(form, data, hasError) {
            if (!hasError) {
                var start = $('#Task_start_time').val();
                var end = $('#Task_end_time').val();
                if (start > end) {
                    alert('Start Time must be before End Time');
                    return false;
                }
            }
            return true;
        }",
    ),
)); ?>

<fieldset>
    <?php if (user()->isSuperAdmin()) { ?>
        <?php echo $form->dropdownListRow($model, 'office_id', Utils::getOfficeOptions(), array('empty' => '-- Select Office --')); ?>
    <?php } else { ?>
        <?php echo $form->hiddenField($model, 'office_id'); ?>
    <?php } ?>
    
    <?php echo $form->textFieldRow($model, 'title')?>
    
    <div class="control-group">
        <label for="Event_start_time" class="control-label required">Start time <span class="required">*</span></label>
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
        <label for="Event_end_time" class="control-label required">End time <span class="required">*</span></label>
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
    
    <?php echo $form->checkBoxRow($model, 'all_date') ?>
    <?php echo $form->textAreaRow($model, 'description', array('rows' => 5)) ?>
</fieldset>
<input type="submit" class="hide"/>
<?php $this->endWidget(); ?>
