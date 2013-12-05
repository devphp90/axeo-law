<?php

/**
 * This is the model class for table "matters".
 *
 * The followings are the available columns in table 'matters':
 * @property integer $id
 * @property integer $office_id
 * @property integer $client_id
 * @property string $name
 * @property string $phone
 */
class Matter extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Matter the static model class
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
        return 'matters';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, office_id', 'required'),
            array('name', 'length', 'max' => 255),
            array('phone', 'length', 'max' => 255),
            array('client_id, office_id', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, office_id, client_id, name', 'safe', 'on' => 'search'),
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
            'client' => array(self::BELONGS_TO, 'Client', 'client_id'),
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
            'client_id' => 'Client',
            'name' => 'Name',
            'phone' => 'Phone',
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
        $criteria->compare('client_id', $this->name, true);
        $criteria->compare('phone', $this->id);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function clientSearch($id)
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->condition = 'client_id=:client_id';
        $criteria->params = array(
            ':client_id' => $id,
        );
        $criteria->compare('id', $this->id);
        $criteria->compare('office_id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('phone', $this->phone, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
