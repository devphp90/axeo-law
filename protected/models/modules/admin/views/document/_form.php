<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'document-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo CHtml::label('Date', 'Document_date'); ?>
<?php echo $form->textField($model, 'date', array('class' => 'span5')); ?>
<?php echo $form->error($model, 'date'); ?>

<?php echo CHtml::label('Name', 'Document_name'); ?>
<?php echo $form->textField($model, 'name', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->error($model, 'name'); ?>

<?php echo $form->textFieldRow($model, 'problem', array('class' => 'span5', 'maxlength' => 40)); ?>

<?php echo $form->textFieldRow($model, 'level', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'ranking', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'target_level', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'target_ranking', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php
if ($model->isNewRecord) {
    echo $form->hiddenField($model, 'user_id', array('value' => Yii::app()->user->id, 'readOnly' => 'readOnly'));
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