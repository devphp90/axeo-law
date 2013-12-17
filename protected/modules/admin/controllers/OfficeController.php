<?php

class OfficeController extends AdminController
{
    public $modelClass = 'Office';

    public function actionCreate()
    {
        $model = new Office('create');
        $user = new User();

        Utils::ajaxValidation(array($model, $user), 'office-form');

        if (isset($_POST['User']) && isset($_POST['Office'])) {
            $user->attributes = $_POST['User'];
            $model->attributes = $_POST['Office'];
            
            if ($model->save()) {
                $user->office_id = $model->id;
                $user->level = User::ROLE_ADMIN;
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

}
