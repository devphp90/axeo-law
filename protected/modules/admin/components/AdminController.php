<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class AdminController extends Controller
{

    public $layout = '/layouts/column2';
    public $homeUrl = '/admin/';
    public $menu = array();
    public $breadcrumbs = array();

    protected function beforeAction($action)
    {
        if ($this->id == 'default')
            return parent::beforeAction($action);

        if (!user()->isGuest && (user()->role == User::ROLE_SUPER_ADMIN || user()->role == User::ROLE_ADMIN)) {
            return parent::beforeAction($action);
        }

        $ignoreControllers = array('role');
        if (in_array($this->id, $ignoreControllers))
            return parent::beforeAction($action);

        $ignores = array('login', 'search', 'logout');
        if (in_array($action->id, $ignores))
            return parent::beforeAction($action);

        $operation = $action->id;
        if ($operation == 'index')
            $operation = 'view';
        $controller = $this->id;

        if ($controller == 'field')
            $controller = 'entityField';

        if (user()->checkAccess($controller . '.' . $operation))
            return parent::beforeAction($action);

        throw new CHttpException(403, "You don't have permission to access this page.");
    }

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules()
    {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'expression' => 'user()->isAdmin() || user()->isSuperAdmin()',
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
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

    public function actionBulkDelete()
    {
        $ids = Yii::app()->request->getPost('ids');

        $criteria = new CDbCriteria;
        $criteria->addInCondition('id', $ids);
        Client::model()->deleteAll($criteria);

        Yii::app()->end();
    }

    public function loadModel($id)
    {
        if (empty($this->modelClass))
            $this->modelClass = ucfirst($this->id);

        $model = @call_user_func(array($this->modelClass, 'model'));

        return $model->findByPk($id);
    }

}