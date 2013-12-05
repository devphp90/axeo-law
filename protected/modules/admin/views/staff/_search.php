<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

    <?php echo $form->textFieldRow($model, 'id', array('class' => 'span5')); ?>

    <?php echo $form->textFieldRow($model, 'username', array('class' => 'span5', 'maxlength' => 30)); ?>

    <?php echo $form->textFieldRow($model, 'email', array('class' => 'span5', 'maxlength' => 100)); ?>

    <<?php echo $form->textFieldRow($model, 'active', array('class' => 'span5')); ?>

    <?php echo $form->textFieldRow($model, 'level', array('class' => 'span5')); ?>

    <?php echo $form->textFieldRow($model, 'created_time', array('class' => 'span5')); ?>

    <?php echo $form->textFieldRow($model, 'updated_time', array('class' => 'span5')); ?>
    

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => 'Search',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
