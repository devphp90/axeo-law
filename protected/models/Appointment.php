<?php

/**
 * This is the model class for table "appointments".
 *
 * The followings are the available columns in table 'appointments':
 * @property integer $id
 * @property integer $office_id
 * @property string $title
 * @property string $name
 * @property string $phone
 * @property string $description
 * @property string $start_time
 * @property string $end_time
 * @property integer $created_date
 * @property integer $status
 */
class Appointment extends ActiveRecord
{

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'appointments';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, name, description, start_time, end_time', 'required'),
            array('created_date, status, office_id', 'numerical', 'integerOnly' => true),
            array('title, name', 'length', 'max' => 32),
            array('phone', 'length', 'max' => 16),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, office_id, title, name, phone, description, start_time, end_time, created_date, status', 'safe', 'on' => 'search'),
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
            'office_id' => 'Office',
            'title' => 'Title',
            'name' => 'Name',
            'phone' => 'Phone',
            'description' => 'Description',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'created_date' => 'Created Date',
            'status' => 'Status',
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
        $criteria->compare('office_id', $this->office_id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('start_time', $this->start_time, true);
        $criteria->compare('end_time', $this->end_time, true);
        $criteria->compare('created_date', $this->created_date);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Appointment the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

}
