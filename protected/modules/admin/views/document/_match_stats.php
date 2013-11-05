<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'document-stat-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
        ));
?>

<?php echo $form->textFieldRow($model, 'score', array('class' => 'span4')); ?>
<?php echo $form->textFieldRow($model, 'aces', array('class' => 'span4')); ?>
<?php echo $form->textFieldRow($model, 'double_faults', array('class' => 'span4')); ?>
<?php echo $form->textFieldRow($model, 'winners', array('class' => 'span4')); ?>
    <?php echo $form->textFieldRow($model, 'unforced_errors', array('class' => 'span4')); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
