<?php

class DocumentController extends AdminController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/column2';

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
				'actions'=>array('index','delete','view','update','create','download'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

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
		$model=new Document;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Document']))
		{
			$model->attributes=$_POST['Document'];
			//$_POST['Document']['content'] = $model->uploadFile();
			if(isset($_FILES['Document']['name']) && !empty($_FILES['Document']['name'])){
				$upload = $model->uploadFile();
			 
				 
				$model->content = $upload['filename'];//$model->uploadFile();
				$model->size = $upload['size'];//$model->uploadFile();
				$model->type = $upload['type'];//$model->uploadFile();
				$model->created_date = date('Y-m-d');//$model->uploadFile();
			}
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
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

		if(isset($_POST['Document']))
		{
            $filename = $model->content;
			$model->attributes=$_POST['Document'];
			/* if(isset($_FILES['Document'])){
				$cUploadedFile = CUploadedFile::getInstance($model,'content');
                                if(isset($cUploadedFile)){
                                       //print_r(file_get_contents($cUploadedFile->tempName));
				       $model->attributes['content']= file_get_contents($cUploadedFile->tempName);
                                 }
			}else */
			if(isset($_FILES['Document']['name']['content']) && !empty($_FILES['Document']['name']['content'])){
				$upload = $model->uploadFile();
				//echo '<pre>';print_r($upload);die;
				$model->content = $upload['filename'];//$model->uploadFile();
				$model->size = $upload['size'];//$model->uploadFile();
				$model->type = $upload['type'];//$model->uploadFile();
				$model->created_date = date('Y-m-d');//$model->uploadFile();
			}else{ 
				$model->content = $filename;
			}
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
                        else print_r($model->getErrors());
		}else
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
		$model=new Document('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Document']))
			$model->attributes=$_GET['Document'];

		$this->render('index',array(
			'model'=>$model,
		));
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Document::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='document-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function getNameLabel($data,$row){
			return '<div class="'.$data->type.'"><span>'.strtoupper($data->type).'</span> '  .  $data->name.'</div>' ;
    }
	
	public function actionDownload($id) {
		$model = Document::model()->find("id=".$id);
		$filename = $model->content;
		if(file_exists(Yii::getPathOfAlias('webroot').'/uploads/documents/'.$filename)){
		
			$filepath = Yii::getPathOfAlias('webroot').'/uploads/documents/'.$filename;
			header("Cache-control: private");
			header("Content-type: application/force-download");
			header("Content-transfer-encoding: binary\n");
			header("Content-disposition: attachment; filename=\"$filename\"");
			header("Content-Length: ".filesize($filepath));
			readfile($filepath);
			exit;
		}
	}
}
					