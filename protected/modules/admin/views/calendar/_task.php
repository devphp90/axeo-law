<strong> From </strong><?php echo date('D, M j, Y - H:i:s', strtotime($model->start_time));?> <strong>To</strong>
<?php echo date('D, M j, Y - H:i:s', strtotime($model->end_time));?>

<?php if(!empty($model->description)) {
    echo "<br /><strong>Description : </strong> ".CHtml::encode($model->description);
}
?>

