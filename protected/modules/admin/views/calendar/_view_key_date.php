<strong> From </strong><?php echo date('D, M j, Y - H:i:s', strtotime($model->start_date));?> <strong>To</strong>
<?php echo date('D, M j, Y - H:i:s', strtotime($model->end_date));?>

<p>
    <strong>Matter:</strong> <?php echo $model->matter->name ?> <br/>
    <strong>Title:</strong> <?php echo $model->title ?> <br/>
    <strong>Description:</strong> <?php echo $model->description ?> <br/>
</p>

