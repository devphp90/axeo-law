<?php echo $form->textFieldRow($keyDate, 'title'); ?>

<div class="control-group">
    <?php echo $form->labelEx($keyDate, 'start_date'); ?>
    <div class="controls">
        <?php
        $this->widget('ext.CJuiDateTimePicker.CJuiDateTimePicker', array(
            'model' => $keyDate,
            'attribute' => 'start_date',
            'language' => '',
            'options' => array(
                'dateFormat' => 'yy-mm-dd', 
                'autoclose' => true,
                'todayBtn' => true,
            )
        ));
        echo $form->error($keyDate, 'start_date');
        ?>
    </div>
</div>

<div class="control-group">
        <?php echo $form->labelEx($keyDate, 'end_date'); ?>
        <div class="controls">
            <?php
            $this->widget('ext.CJuiDateTimePicker.CJuiDateTimePicker', array(
                'model' => $keyDate,
                'attribute' => 'end_date',
                'language' => '',
                'options' => array(
                    'dateFormat' => 'yy-mm-dd', 
                    'autoclose' => true,
                    'todayBtn' => true,
                )
            ));
            echo $form->error($keyDate, 'end_date');
            ?>
        </div>
    </div>

<?php echo $form->textAreaRow($keyDate, 'description'); ?>