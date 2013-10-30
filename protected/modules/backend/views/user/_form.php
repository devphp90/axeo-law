
<script>
$(function(){
	$('.action input[type="checkbox"]').live('click',function(){
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
	
	$('.column_all input[type="checkbox"]').live('click',function(){
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
		url: '/backend/user/updatePermission',
		type: "GET",
		data:{
			controller: controller,
			permission: permission,
			uid: <?php echo isset($model->id)?$model->id:0?>,
		},
		success: function(){

			
		}
		
	});

}

function roleSubmit()
{
	$.ajax({
		url: '/backend/user/addRole',
		type: "GET",
		data:{
			uid: <?php echo isset($model->id)?$model->id:0?>,
			rid: $('#rid').val(),
		},
		success: function(){
			$.fn.yiiGridView.update('role-grid');
			//console.log('success');
		}
		
	});
}

function permissionSubmit()
{
	$.ajax({
		url: '/backend/user/addPermissionController',
		type: "GET",
		data:{
			uid: <?php echo isset($model->id)?$model->id:0?>,
			controller: $('#permissionController').val(),
		},
		success: function(){
			$.fn.yiiGridView.update('permission-grid');

			//console.log('success');
		}
		
	});
			
}
</script>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'active',array('class'=>'span5')); ?>

	<br/>
	<br/>
	<?php
	if(!$model->isNewRecord){
	?>
	<div class="accordion" id="accordion2">
	<div class="accordion-group">
	    <div class="accordion-heading">
	        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
	            Roles
	        </a>
	    </div>
	    <div id="collapseOne" class="accordion-body collapse in">
	        <div class="accordion-inner">
	            	<?php echo CHtml::dropDownList('rid',0, CHtml::listData(Role::model()->findAll(),'id','name'))?>
	            	<a href="#accordion2" onclick="roleSubmit();"><i class="icon-plus"></i>Assign</a>
	            	<?php $this->widget('bootstrap.widgets.TbGridView',array(
						'id'=>'role-grid',
						'dataProvider'=>$model->roleSearch($model->id),
						'summaryText'=>'',
						'columns'=>array(
							'id',
							array(
								'name'=>'rid',
								'value'=>'$data->role->name',
								'header'=>'role',
							),
							array(
								'class'=>'bootstrap.widgets.TbButtonColumn',
								'template'=>'{delete}',
								'deleteButtonUrl'=>'Yii::app()->controller->createUrl("/backend/user/deleteRole",array("id"=>$data->id))',
							),
						),
					)); ?>
	        </div>
	    </div>
	</div>
	<div class="accordion-group">
	  <div class="accordion-heading">
	      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
	          Permission
	      </a>
	  </div>
	  <div id="collapseTwo" class="accordion-body collapse">
	      <div class="accordion-inner">
	      	<?php echo CHtml::dropDownList('permissionController',0, UserPermission::model()->getController())?>
	          <a href="#accordion2" onclick="permissionSubmit();"><i class="icon-plus"></i>Assign</a>
	          <?php $this->widget('bootstrap.widgets.TbGridView',array(
				'id'=>'permission-grid',
				'dataProvider'=>UserPermission::model()->perSearch($model->id),
				'summaryText'=>'',
				'columns'=>array(
					'controller',
					array(
						'name'=>'create',
						'type'=>'raw',
						'value'=>'CHtml::checkBox(\'Permission[\'.$data->controller.\'][Create]\',$data->create,array(\':action\'=>\'create\'))',
						'htmlOptions'=>array(
							'class'=>'action',
						)
					),
					array(
						'name'=>'update',
						'type'=>'raw',
						'value'=>'CHtml::checkBox(\'Permission[\'.$data->controller.\'][update]\',$data->update,array(\':action\'=>\'update\'))',
						'htmlOptions'=>array(
							'class'=>'action',
						)
					),
					array(
						'name'=>'delete',
						'type'=>'raw',
						'value'=>'CHtml::checkBox(\'Permission[\'.$data->controller.\'][delete]\',$data->delete,array(\':action\'=>\'delete\'))',
						'htmlOptions'=>array(
							'class'=>'action',
						)
					),
					array(
						'name'=>'view',
						'type'=>'raw',
						'value'=>'CHtml::checkBox(\'Permission[\'.$data->controller.\'][view]\',$data->view,array(\':action\'=>\'view\'))',
						'htmlOptions'=>array(
							'class'=>'action',
						)
					),
					array(
						'value'=>'CHtml::checkBox("check_all",$data->view && $data->create && $data->update && $data->delete?1:0)',
						'type'=>'raw',
						'htmlOptions'=>array(
							'class'=>'column_all',
						)
					),
					array(
						'class'=>'bootstrap.widgets.TbButtonColumn',
						'template'=>'{delete}',
						'deleteButtonUrl'=>'Yii::app()->controller->createUrl("/backend/user/deletePermissionController",array("uid"=>'.$model->id.',"controller"=>$data->controller))',
					),
					/*
'create' => ,
					'update' => CHtml::checkBox('Permission[	'.$_controllerName.'][Update]',$permission['update'],array(':action'=>'update')),
					'delete' => CHtml::checkBox('Permission['.$_controllerName.'][Delete]',$permission['delete'],array(':action'=>'delete')),
					'view' => CHtml::checkBox('Permission['.$_controllerName.'][View]',$permission['view'],array(':action'=>'view')),
					'all' => CHtml::checkBox('check_all'),
*/
				),
			)); ?>
	      </div>
	  </div>
	</div>
	<?php
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
