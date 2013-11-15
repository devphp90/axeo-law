<?php echo $form->textFieldRow($model, 'username', array('class' => 'span5', 'maxlength' => 30)); ?>

<?php echo $form->passwordFieldRow($model, 'password', array('class' => 'span5', 'maxlength' => 32)); ?>

<?php echo $form->textFieldRow($model, 'email', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'active', array('class' => 'span5')); ?>

<?php

if (!$model->isNewRecord && $model->level != User::ROLE_SUPER_ADMIN && $model->a_id != 0) {
    echo CHtml::checkBox('isAdmin');
}
?>