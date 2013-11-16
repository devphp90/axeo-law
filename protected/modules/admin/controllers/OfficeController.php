<?php

class OfficeController extends AdminController
{

    public $layout = '/layouts/column2';

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Office('create');
        $user = new User();

        Utils::ajaxValidation(array($model, $user), 'office-form');

        if (isset($_POST['User']) && isset($_POST['Office'])) {
            $user->attributes = $_POST['User'];
            $model->attributes = $_POST['Office'];
            
            if ($model->save()) {
                $user->a_id = $model->id;
                if ($user->save()) {
                    $model->admin_id = $user->id;
                    $model->save();
                    $this->redirect(array('view', 'id' => $model->id));
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
            'user' => $user,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $user = $model->admin;
        $user->password = '';
        
        Utils::ajaxValidation(array($model, $user), 'office-form');
        
        if (isset($_POST['Office']) && isset($_POST['User'])) {
            $model->attributes = $_POST['Office'];
            $user->attributes = $_POST['User'];
            
            if ($model->save() && $user->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
            'user' => $user
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
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

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $model = new Office('search');
        
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Office']))
            $model->attributes = $_GET['Office'];
        
        $this->pageTitle = 'Law - Offices';
        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = Office::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'office-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
