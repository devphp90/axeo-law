<?php

class DefaultController extends BackendController
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('login'),
				'users'=>array('*'),
			),
			array('allow',
				'actions'=>array('index','user','uidemo'),
				'expression'=>'$user->isAccount()',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionUidemo()
	{
		$this->layout = 'demo';
		$type = Yii::app()->request->getQuery('type','component');

		$this->render('uidemo',compact('type'));
	}	
	
	public function actionIndex()
	{
		$this->render('index');
	}
	
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new BackendLoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='backend-login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		// collect user input data
		if(isset($_POST['BackendLoginForm']))
		{
			$model->attributes=$_POST['BackendLoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect('/backend/default/index');
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	
}