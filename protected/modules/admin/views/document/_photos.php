<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'document-photo-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    ),
)); ?>


	<?php echo $form->errorSummary($photo_model); ?>

    <?php if (!empty($uploaded_photo)) {
        $gallery = array();?>

        <div><strong>Uploaded Photos</strong></div>

        <ul class="thumbnails">
        <?php foreach ($uploaded_photo as $photo) {
            $gallery[] = Yii::app()->baseUrl.'/photos/'.$photo->file_name;
            ?>
            <li>
            <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/photos/thumb/'.$photo->file_name, $photo->file_name), Yii::app()->baseUrl.'/photos/'.$photo->file_name, array('class' => 'thumbnail', 'rel' => 'gallery'));?>


            </li>

        <?php }?>
        </ul>
        <hr/>
    <?php }
?>
    <?php
    echo "<p class='highlight'>The file must be less than and equal to 640*480 px</p>";
    echo $form->fileField($photo_model, 'file_name');
    ?>

    <?php echo $form->error($photo_model, 'file_name'); ?>

    <div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

<?php
$this->widget('ext.yiiColorbox.colorboxWidget', array(
    'registerScript' => true,
    "theme" => "4",
    "triggerclass" => "thumbnail", //
    "options" => array("height" => "600", "width" => "860"),
    "actions" => array(
    ),
));
?>

<script type="text/javascript">

    $('.deletebtn').on('click', function () {
        if(!confirm("Are you sure you want to delete this image?"))
            return false;
        id = $(this).attr('data-id');
        $.ajax({
            url: '<?php echo Yii::app()->createUrl('/admin/document/deletePhoto')?>',
            data: {id: id},
            type: 'POST',
            success: function () {}
        });
        $(this).parent().remove();
    });

    //$('a.thumbnail').colorbox({rel:'gallery'});
</script>