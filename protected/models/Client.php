<?php

/**
 * This is the model class for table "clients".
 *
 * The followings are the available columns in table 'clients':
 * @property integer $id
 * @property integer $office_id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $skype
 * @property string $facebook
 */
class Client extends ActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Client the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'clients';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, email, office_id', 'required'),
            array('office_id', 'numerical', 'integerOnly' => true),
            array('email', 'email'),
            array('name', 'length', 'max' => 255),
            array('phone', 'length', 'max' => 20),
            array('skype', 'length', 'max' => 100),
            array('facebook', 'length', 'max' => 150), //added field for facebookaddress > ishit (softweb) : 10/17/13
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, email, phone, skype, facebook', 'safe', 'on' => 'search'),
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
            'office' => array(self::BELONGS_TO, 'Office', 'office_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'office_id' => 'Office',
            'name' => 'Name',
            'phone' => 'Phone Number',
            'email' => 'Email',
            'skype' => 'Skype',
            'facebook' => 'Facebook',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        if (user()->isAdmin()) {
            $office_id = user()->officeId;
            $criteria->condition = 'office_id = :officeId';
            $criteria->params = array(':officeId' => $office_id);
        } else
            $criteria->compare('office_id', $this->office_id);

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('skype', $this->skype, true);
        $criteria->compare('facebook', $this->facebook, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getNameFilterOptions()
    {
        if (user()->isAdmin())
            return CHtml::listData(self::model()->findAllByAttributes(array('office_id' => user()->officeId)), 'id', 'name');
        else
            return CHtml::listData(self::model()->findAll(), 'name', 'name');
    }

}
