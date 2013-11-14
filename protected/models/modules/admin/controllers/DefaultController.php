<?php

class DefaultController extends AdminController
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
				'actions'=>array('index','login'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
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
		$model=new AdminLoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='admin-login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		// collect user input data
		if(isset($_POST['AdminLoginForm']))
		{
			$model->attributes=$_POST['AdminLoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect('/admin/default/index');
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	
}