<?php

class LendersController extends AdminController
{
    public $modelClass = 'Lenders';
    
    public function actionCreate()
    {
        $model = new Lenders;

        if (isset($_POST['Lenders'])) {
            $model->attributes = $_POST['Lenders'];
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

        if (isset($_POST['Lenders'])) {
            $model->attributes = $_POST['Lenders'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionIndex()
    {
        $model = new Lenders('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Lenders']))
            $model->attributes = $_GET['Lenders'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

}
