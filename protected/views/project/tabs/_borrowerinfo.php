
<?php 

$this->widget('bootstrap.widgets.TbAlert', array(
    'block'=>true, // display a larger alert block?
    'fade'=>true, // use transitions?
    'closeText'=>'×', // close link text - if set to false, no close link is displayed
    'alerts'=>array( // configurations per alert type
	    'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'×'), // success, info, warning, error or danger
    ),
));
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($supplierModel); ?>

	<?php echo $form->textFieldRow($supplierModel,'username',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->passwordFieldRow($supplierModel,'password',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($supplierModel,'firstname',array('class'=>'span5','maxlength'=>20)); ?>
	<?php echo $form->textFieldRow($supplierModel,'middlename',array('class'=>'span5','maxlength'=>20)); ?>
	<?php echo $form->textFieldRow($supplierModel,'lastname',array('class'=>'span5','maxlength'=>20)); ?>
	<?php echo $form->textFieldRow($supplierModel,'phone',array('class'=>'span5','maxlength'=>20)); ?>
	<?php echo $form->textFieldRow($supplierModel,'address',array('class'=>'span5','maxlength'=>100)); ?>
	<?php echo $form->textFieldRow($supplierModel,'skype',array('class'=>'span5','maxlength'=>20)); ?>
	<?php echo $form->textFieldRow($supplierModel,'email',array('class'=>'span5','maxlength'=>100)); ?>
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$supplierModel->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>