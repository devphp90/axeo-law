<?php

/**
 * This is the model class for table "tasks".
 *
 * The followings are the available columns in table 'tasks':
 * @property integer $id
 * @property integer $office_id
 * @property string $title
 * @property string $description
 * @property string $start_time
 * @property string $end_time
 * @property integer $all_date
 * @property integer $created_time
 */
class Task extends ActiveRecord
{
    const ALL_DATE_YES = 1;
    const ALL_DATE_NO = 0;
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Task the static model class
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
        return 'tasks';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('office_id, title, start_time, end_time', 'required'),
            array('office_id, all_date, created_time', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 32),
            array('description, all_date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, office_id, title, description, start_time, end_time, all_date, created_time', 'safe', 'on' => 'search'),
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
            'description' => 'Description',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'all_date' => 'All Date',
            'created_time' => 'Created Time',
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
        $criteria->compare('office_id', $this->office_id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('start_time', $this->start_time, true);
        $criteria->compare('end_time', $this->end_time, true);
        $criteria->compare('all_date', $this->all_date);
        $criteria->compare('created_time', $this->created_time);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}