<?php

class RoleController extends AdminController
{
    public $layout = '/layouts/column2';
    
    public function actionCreate()
    {
        $model = new Role;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Role'])) {
            $model->attributes = $_POST['Role'];
            if (user()->isAdmin())
                $model->office_id = user()->getParent();
            if ($model->save()) {
                $auth = app()->authManager;
                $auth->createRole('role_'.$model->id);
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Role'])) {
            $model->attributes = $_POST['Role'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionIndex()
    {
        $model = new Role('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Role']))
            $model->attributes = $_GET['Role'];
        if (user()->isAdmin())
            $model->office_id = user()->officeId;

        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function loadModel($id)
    {
        $model = Role::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'role-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionView($id)
    {
        $model = $this->loadModel($id);
        
        $auth = auth();
        $role = $auth->getAuthItem('role_' . $model->id);
        
        if ($role == null)
            $role = $auth->createRole('role_' . $model->id);
        $children = $role->children;
        $children = array_keys($children);
        $objects = array(
            'staff' => 'Staff', 'client' => 'Client', 'matter' => 'Matter', 'document' => 'Document',
        );
        
        $roles = array();
        $data = array();
        foreach ($objects as $object => $text) {
            $data[$object] = array(
                    'create' => in_array($object . '.create', $children),
                    'update' => in_array($object . '.update', $children),
                    'view'  =>  in_array($object . '.view', $children),
                    'delete' => in_array($object . '.delete', $children)
            );
            $roles[] = $object . '.create';
            $roles[] = $object . '.update';
            $roles[] = $object . '.view';
            $roles[] = $object . '.delete';
        }
        
        if (isset($_POST['Operations']) || request()->isPostRequest) {
            if (!isset($_POST['Operations']) || !is_array($_POST['Operations']))
                $_POST['Operations'] = array();
            $operations = array_keys($_POST['Operations']);
            foreach ($roles as $key) {
                $this->checkOperation($key);
                if (in_array($key, $operations)) {
                    if (!$role->hasChild($key)) {
                        $role->addChild($key);
                    }
                } else {
                    if ($role->hasChild($key)) {
                        $role->removeChild($key);
                    }
                }
            }
            $this->redirect(url('admin/role/view', array('id' => $model->id)));
        }
        
        $this->render('view', array(
            'model' => $model,
            'operations' => $data,
            'objects' => $objects
        ));
    }
    
    private function checkOperation($operation)
    {
        $item = auth()->getAuthItem($operation);
        if ($item == null)
            $item = auth()->createOperation($operation);
        return $item;
    }

}
