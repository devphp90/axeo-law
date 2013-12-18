<strong> From </strong><?php echo date('D, M j, Y - H:i:s', strtotime($model->start_time));?> <strong>To</strong>
<?php echo date('D, M j, Y - H:i:s', strtotime($model->end_time));?>

<h1><?php echo $model->title ?></h1>
<p><?php echo $model->name ?></p>
<?php if(!empty($model->description)) {
    echo "<br /><strong>Description : </strong> ".CHtml::encode($model->description);
}
?>

