<?php

class AppointmentController extends AdminController
{
    public $modelClass = 'Appointment';
    
    public function actionCreate()
    {
        $model = new Appointment;

        if (isset($_POST['Appointment'])) {
            $model->attributes = $_POST['Appointment'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        if (isset($_POST['Appointment'])) {
            $model->attributes = $_POST['Appointment'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionIndex()
    {
        $model = new Appointment('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Appointment']))
            $model->attributes = $_GET['Appointment'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

}
