<div class="form">

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'test-form',
	'enableAjaxValidation'=>false,
	'method'=>'post',
	'type'=>'horizontal',
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data'
	)
)); ?>

	<fieldset>
		<legend>
			<p class="note">Fields with <span class="required">*</span> are required.</p>
		</legend>

		<?php echo $form->errorSummary($model, 'Opps!!!', null, array('class'=>'alert alert-error span12')); ?>

		<div class="control-group">
			<div class="span4">
				<div class="control-group <?php if ($model->hasErrors('first_name')) echo "error"; ?>">
					<?php echo $form->labelEx($model,'first_name'); ?>
					<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>100)); ?>
				</div>
				<div class="control-group <?php if ($model->hasErrors('last_name')) echo "error"; ?>">
					<?php echo $form->labelEx($model,'last_name'); ?>
					<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>100)); ?>
				</div>
				<div class="control-group <?php if ($model->hasErrors('email')) echo "error"; ?>">
					<?php echo $form->labelEx($model,'email'); ?>
					<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
				</div>
				<div class="control-group <?php if ($model->hasErrors('address')) echo "error"; ?>">
					<?php echo $form->labelEx($model,'address'); ?>
					<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50)); ?>
				</div>
			</div>
		</div>

		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'icon'=>'ok white', 'label'=>$model->isNewRecord ? 'Create' : 'Save')); ?>
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'icon'=>'remove', 'label'=>'Reset')); ?>
		</div>

	</fieldset>

<?php $this->endWidget(); ?>

</div><!-- form -->