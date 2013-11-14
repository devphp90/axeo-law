<?php

class UserController extends BackendController
{
	public $layout='/layouts/column2';
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}


	public function actionDeletePermissionController($uid, $controller)
	{
		$userModel = $this->loadModel($uid);
		
		
		$model = UserPermission::model()->findByAttributes(array(
			'uid'=>$userModel->id,
			'controller'=>$controller,
		));
		
		if($model != null){
			$model->delete();
		}
		
	}
	
	
	public function actionAddPermissionController($uid, $controller)
	{

		$userModel = $this->loadModel($uid);
		
		$model = UserPermission::model()->findByAttributes(array(
			'uid'=>$userModel->id,
			'controller'=>$controller,
		));
		
		if($model == null){
			$model = new UserPermission;
			$model->uid = $userModel->id;
			$model->controller = $controller;
			$model->create = 0;
			$model->update = 0;
			$model->delete = 0;
			$model->view = 0;
			$model->save();
		}
		
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('index',array(
			'model'=>$model,
		));
	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDeleteRole($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model = UserRole::model()->findByPk($id);
			
			$userModel = $this->loadModel($model->uid);

			$model->delete();
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	
	public function actionUpdatePermission()
	{
		$uid = Yii::app()->request->getQuery('uid',0);
		$userModel = $this->loadModel($uid);
		$controller = Yii::app()->request->getQuery('controller',0);
		$permission = Yii::app()->request->getQuery('permission',array('create'=>0,'update'=>0,'delete'=>0,'view'=>0));
		
		$model = UserPermission::model()->findByAttributes(array('uid'=>$uid,'controller'=>$controller));
		
		if($model == null){
			$model = new UserPermission;
			$model->uid = $uid;
		}
		
		$model->controller = $controller;
		$model->create = $permission['create'];
		$model->update = $permission['update'];
		$model->delete = $permission['delete'];
		$model->view = $permission['view'];
		
		$model->save();
	}
	
	public function actionAddRole()
	{
		$uid = Yii::app()->request->getQuery('uid',0);
		$rid = Yii::app()->request->getQuery('rid',0);
		$userModel = $this->loadModel($uid);
		$model = new UserRole;
		$model->uid = $uid;
		$model->rid = $rid;
		$model->save();
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null || $model->a_id != Yii::app()->user->id)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
