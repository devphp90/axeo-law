<script>
$(function(){
	$('.action input[type="checkbox"]').click(function(){
		updatePermission($(this));
		var flag = 1;
		$(this).parents('tr').find('.action input').each(function(){
			if(!$(this).attr("checked"))
				flag = 0;
		});
		if(flag == 1)
			$(this).parents('tr').find('.column_all input[type="checkbox"]').attr("checked", true);
		else
			$(this).parents('tr').find('.column_all input[type="checkbox"]').attr("checked", false);
	});
	
	$('.column_all input[type="checkbox"]').click(function(){
		if($(this).attr("checked"))
			$(this).parents('tr').find('.action input').each(function(){
				 $(this).attr("checked", true);
			});
		else
			$(this).parents('tr').find('.action input').each(function(){
				 $(this).attr("checked", false);
			});
		updatePermission($(this));
	});
});
function updatePermission(th)
{
	var controller = th.parents('tr').children().html();
	var permission = {
		'create' : 0,
		'update' : 0,
		'delete' : 0,
		'view' : 0,
	};
	
	
	th.parents('tr').find('.action input').each(function(){
			permission[$(this).attr(":action")] = $(this).attr("checked")?1:0;
	});
	$.ajax({
		url: '/backend/role/updatePermission',
		type: "GET",
		data:{
			controller: controller,
			permission: permission,
			rid: <?php echo isset($model->id)?$model->id:0?>,
		},
		success: function(){
			//console.log('success');
		}
		
	});

}
</script>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'role-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5')); ?>

	<?php 
	if(!$model->isNewRecord){
	$this->widget('bootstrap.widgets.TbGridView',array(
				'id'=>'permission-grid',
				'dataProvider'=>RolePermission::model()->permissionSearch($model->id),
				'summaryText'=>'',
				'columns'=>array(
					'controller',
					array(
						'type'=>'raw',
						'name'=>'create',
						'htmlOptions'=>array(
							'class'=>'action',
						)
					),
					array(
						'type'=>'raw',
						'name'=>'update',
						'htmlOptions'=>array(
							'class'=>'action',
						)
					),
					array(
						'type'=>'raw',
						'name'=>'delete',
						'htmlOptions'=>array(
							'class'=>'action',
						)
					),
					array(
						'type'=>'raw',
						'name'=>'view',
						'htmlOptions'=>array(
							'class'=>'action',
						)
					),
					array(
						'type'=>'raw',
						'name'=>'all',
						'htmlOptions'=>array(
							'class'=>'column_all',
						)
					),
				),
			)); 
			}
			?>
			
			
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
