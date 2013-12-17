<?php

class StaffController extends AdminController
{
    public $modelClass = 'User';
    
    public function actionCreate()
    {
        $model = new User;

        Utils::ajaxValidation($model, 'staff-form');

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            
            if (user()->isAdmin()) {
                $model->office_id = user()->officeId;
            }
            
            if ($model->save()) {
                if (!empty($model->role_id))
                    auth()->assign('role_' . $model->role_id, $model->id);
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
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
        $model->unsetAttributes(array('password'));
        $oldRole = $model->role_id;
        
        Utils::ajaxValidation($model, 'staff-form');

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            
            if (!user()->isSuperAdmin() && !empty($_POST['isAdmin'])) {
                $model->level = USER::ROLE_ADMIN;
            }
            
            if ($model->save()) {
                if ($oldRole != $model->role_id) {
                    if (!empty($model->role_id))
                        auth()->assign('role_' . $model->role_id, $model->id);
                    if (!empty($oldRole))
                        auth()->revoke('role_' . $oldRole, $model->id);
                }
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }


    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $model = new User('search');
        
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];
        
        $this->pageTitle = 'Law - Offices';
        $this->render('index', array(
            'model' => $model,
        ));
    }

}
