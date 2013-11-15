<?php

/**
 * This is the model class for table "offices".
 *
 * The followings are the available columns in table 'offices':
 * @property integer $id
 * @property string $name
 * @property integer $admin_id
 * @property string $address
 * @property string $phone
 */
class Office extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Office the static model class
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
        return 'offices';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, address, phone', 'required'),
            array('admin_id', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 50),
            array('address', 'length', 'max' => 100),
            array('phone', 'length', 'max' => 20),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, admin_id, address, phone', 'safe', 'on' => 'search'),
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
            'admin_id' => 'Admin',
            'address' => 'Address',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('admin_id', $this->admin_id);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('phone', $this->phone, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}