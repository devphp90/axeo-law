<strong> From </strong><?php echo date('D, M j, Y - H:i:s', strtotime($model->start_time));?> <strong>To</strong>
<?php echo date('D, M j, Y - H:i:s', strtotime($model->end_time));?>

<p>
    <strong>Title:</strong> <?php echo $model->title ?> <br/>
    <strong>Name:</strong> <?php echo $model->name ?> <br/>
    <strong>Description:</strong> <?php echo $model->description ?> <br/>
</p>

