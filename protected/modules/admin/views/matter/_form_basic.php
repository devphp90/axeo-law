<?php

if (user()->isAdmin())
    $clients = Client::model()->findAll('office_id = :officeId', array(':officeId' => user()->officeId));
else
    $clients = Client::model()->findAll();
?>

<?php echo $form->dropdownListRow($model, 'client_id', CHtml::listData($clients, 'id', 'name'), array('class' => 'span5', 'empty' => '-- Select Client --')); ?>

<?php echo $form->hiddenField($model, 'office_id'); ?>

<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'phone', array('class' => 'span5', 'maxlength' => 255)); ?>