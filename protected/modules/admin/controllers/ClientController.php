<?php

class ClientController extends AdminController 
{
    public $modelClass = 'Client';
    
    public function actionCreate()
    {
        $model = new Client();
        if (user()->isAdmin())
            $model->office_id = user()->officeId;

        Utils::ajaxValidation($model, 'client-form');

        if (isset($_POST['Client'])) {
            $model->attributes = $_POST['Client'];
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
        
        Utils::ajaxValidation($model, 'client-form');
        
        if (isset($_POST['Client'])) {
            $model->attributes = $_POST['Client'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }
    
    public function actionIndex()
    {
        $model = new Client('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Client']))
            $model->attributes = $_GET['Client'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

}
