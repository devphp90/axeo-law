<?php

class MatterController extends AdminController
{
    public $modelClass = 'Matter';
    
    public function actionCreate()
    {
        $model = new Matter();
        
        if (user()->isAdmin())
            $model->office_id = user()->officeId;

        Utils::ajaxValidation($model, 'matter-form');
        
        if (isset($_POST['Matter'])) {
            $model->attributes = $_POST['Matter'];
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

        Utils::ajaxValidation($model, 'matter-form');

        if (isset($_POST['Matter'])) {
            $model->attributes = $_POST['Matter'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionClientView($id)
    {
        $model = new Matter('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Matter']))
            $model->attributes = $_GET['Matter'];


        $this->render('clientview', array(
            'model' => $model,
            'id' => $id,
        ));
    }

    public function actionIndex()
    {
        $model = new Matter('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Matter']))
            $model->attributes = $_GET['Matter'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function actionChangeClient()
    {
        if (app()->request->isAjaxRequest) {
            $id = app()->request->getParam('id');
           
            $client = Client::model()->findByPk($id);
            
            if ($client)
                echo $client->office_id;
            else
                echo 0;
            
            app()->end();
        }
    }
}
