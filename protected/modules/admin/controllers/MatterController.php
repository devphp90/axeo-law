<?php

class MatterController extends AdminController
{
    public $layout = '/layouts/column2';

    public function actionCreate()
    {
        $model = new Matter();
        
        if (user()->isAdmin())
            $model->office_id = user()->getParent();

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

    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
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

    public function loadModel($id)
    {
        $model = Matter::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
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
