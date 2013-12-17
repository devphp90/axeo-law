<?php

class DocumentController extends AdminController
{
    public $modelClass = 'Document';
    
    public function accessRules()
    {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('index', 'delete', 'view', 'update', 'create', 'download'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionCreate()
    {
        $model = new Document;

        if (isset($_POST['Document'])) {
            $model->attributes = $_POST['Document'];
            if (isset($_FILES['Document']['name']) && !empty($_FILES['Document']['name'])) {
                $upload = $model->uploadFile();

                $model->content = $upload['filename']; //$model->uploadFile();
                $model->size = $upload['size']; //$model->uploadFile();
                $model->type = $upload['type']; //$model->uploadFile();
                $model->created_date = date('Y-m-d'); //$model->uploadFile();
            }
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

        if (isset($_POST['Document'])) {
            $filename = $model->content;
            $model->attributes = $_POST['Document'];
            
            if (isset($_FILES['Document']['name']['content']) && !empty($_FILES['Document']['name']['content'])) {
                $upload = $model->uploadFile();
                //echo '<pre>';print_r($upload);die;
                $model->content = $upload['filename']; //$model->uploadFile();
                $model->size = $upload['size']; //$model->uploadFile();
                $model->type = $upload['type']; //$model->uploadFile();
                $model->created_date = date('Y-m-d'); //$model->uploadFile();
            } else {
                $model->content = $filename;
            }

            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
            else
                print_r($model->getErrors());
        }else
            $this->render('update', array(
                'model' => $model,
            ));
    }

    public function actionIndex()
    {
        $model = new Document('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Document']))
            $model->attributes = $_GET['Document'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function getNameLabel($data, $row)
    {
        return '<div class="' . $data->type . '"><span>' . strtoupper($data->type) . '</span> ' . $data->name . '</div>';
    }

    public function actionDownload($id)
    {
        $model = Document::model()->find("id=" . $id);
        $filename = $model->content;
        if (file_exists(Yii::getPathOfAlias('webroot') . '/uploads/documents/' . $filename)) {

            $filepath = Yii::getPathOfAlias('webroot') . '/uploads/documents/' . $filename;
            header("Cache-control: private");
            header("Content-type: application/force-download");
            header("Content-transfer-encoding: binary\n");
            header("Content-disposition: attachment; filename=\"$filename\"");
            header("Content-Length: " . filesize($filepath));
            readfile($filepath);
            exit;
        }
    }

}

