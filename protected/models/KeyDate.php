<?php

/**
 * This is the model class for table "key_dates".
 *
 * The followings are the available columns in table 'key_dates':
 * @property integer $id
 * @property integer $office_id
 * @property integer $matter_id
 * @property string $title
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property integer $updated_date
 * @property integer $created_date
 * @property integer $status
 */
class KeyDate extends ActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'key_dates';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, start_date, end_date', 'required'),
            array('office_id, matter_id, updated_date, created_date, status', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 32),
            array('description', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, office_id, matter_id, title, description, start_date, end_date, updated_date, created_date, status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'office_id' => 'Office',
            'matter_id' => 'Matter',
            'title' => 'Title',
            'description' => 'Description',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'updated_date' => 'Updated Date',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('office_id', $this->office_id);
        $criteria->compare('matter_id', $this->matter_id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('start_date', $this->start_date, true);
        $criteria->compare('end_date', $this->end_date, true);
        $criteria->compare('updated_date', $this->updated_date);
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
     * @return KeyDate the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
