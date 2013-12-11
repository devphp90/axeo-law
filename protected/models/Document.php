<?php

/**
 * This is the model class for table "document".
 *
 * The followings are the available columns in table 'document':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $content
 */
class Document extends ActiveRecord
{

    public function tableName()
    {
        return 'document';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, description, content, size, type, created_date', 'required'),
            array('name, description', 'length', 'max' => 256),
            array('content', 'length', 'max' => 255),
            array('size, type', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, description, content, size, type, created_date', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'content' => 'Content',
            'size' => 'Size',
            'type' => 'Type',
            'created_date' => 'Created Date',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('size', $this->size, true);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('created_date', $this->created_date, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Document the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function afterFind()
    {
        //$this->content = substr($this->content, 0, 100).' ...';
        $this->content = substr($this->content, 0, 100);
    }

    public function uploadFile()
    {
        //p($_FILES);

        /*  echo '<pre>';
          print_r($_FILES['Document']);die; */

        $foldername = 'documents';
        if (isset($_FILES['Document']['name']['content']) && !empty($_FILES['Document']['name']['content'])) {
            $uploaddir = Yii::getPathOfAlias('webroot') . '/uploads/' . $foldername . '/';
            $valid_formats = array("pdf", "png", "mp4");

            $name = $_FILES['Document']['name']['content'];
            $size = $_FILES['Document']['size']['content'];
            $type = explode("/", $_FILES['Document']['type']['content']);
            $fileSize = $size / 1024;
            if (strlen($name)) {
                list($txt, $ext) = explode(".", $name);

                if (in_array($ext, $valid_formats)) {
                    /* if($size<(1024*1024*1024))
                      { */
                    $actual_image_name = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;
                    $file = $uploaddir . basename($_FILES['Document']['name']['content']);
                    $tmp = $_FILES['Document']['tmp_name']['content'];
                    $image = $_FILES['Document']['name']['content'];

                    if (move_uploaded_file($tmp, $file)) {
                        $baseUrl = "http://" . $_SERVER["HTTP_HOST"] . Yii::app()->baseUrl . "/uploads/" . $foldername . "/" . $image;
                        $file = array('filename' => $image, 'size' => $fileSize, 'type' => $type[1]);
                        return $file;
                        return $image;
                    }
                    //}
                } else {
                    //echo "<span class='flash-error-client'>Error while uploading</span>";
                    $this->addError('content', 'File type support "pdf","png","mp4"');
                }
            }
        }
    }

    public function getFileSize($filename)
    {
        if (file_exists(Yii::getPathOfAlias('webroot') . '/uploads/documents/' . $filename)) {
            $fileSize = filesize(Yii::getPathOfAlias('webroot') . '/uploads/documents/' . $filename);
            return $fileSize;
        }
        return 0;
    }

    public function getContents($model)
    {
        if ($model->type == 'png') {
            return '<img src="' . Yii::app()->baseUrl . '/uploads/documents/' . $model->content . '" height="200" width="200" />';
        } elseif ($model->type == 'pdf') {
            return '<a href="' . Yii::app()->baseUrl . '/uploads/documents/' . $model->content . '" target="_blank">' . $model->content . '</a>';
        }
    }

}