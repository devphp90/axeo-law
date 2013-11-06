<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'document-pdf-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data'
    ),
        ));
?>


    <?php echo $form->errorSummary($pdf_model); ?>

    <?php if (!empty($uploaded_pdf)) {
        ?>

        <div><strong>Uploaded Pdf</strong></div>
        <?php echo $uploaded_pdf->file_name; ?>
        <hr/>
    <?php } ?>
        
    <?php echo $form->fileField($pdf_model, 'file_name'); ?>

    <?php echo $form->error($pdf_model, 'file_name'); ?>

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


<script type="text/javascript">

    $('.deletebtn').on('click', function () {
        if(!confirm("Are you sure you want to delete this pdf?"))
            return false;
        id = $(this).attr('data-id');
        $.ajax({
            url: '<?php echo Yii::app()->createUrl('/admin/document/deletePdf') ?>',
            data: {id: id},
            type: 'POST',
            success: function () {}
        });
        $(this).parent().remove();
    });

    //$('a.thumbnail').colorbox({rel:'gallery'});
</script>