<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'document-plan-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
        ));
?>
<?php echo $form->errorSummary($model); ?>

<?php echo $form->textArea($model, 'plan', array('class' => 'span8', 'rows' => '8')); ?>
    <?php echo $form->error($model, 'plan'); ?>

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
