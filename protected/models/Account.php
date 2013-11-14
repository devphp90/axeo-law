<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $active
 * @property integer $level
 * @property string $create_time
 * @property string $update_time
 */
class Account extends User
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('password', 'required', 'on' => 'insert'),
            array('username, email, active', 'required'),
            array('username', 'unique'),
            array('active, isAdmin', 'numerical', 'integerOnly' => true),
            array('username', 'length', 'max' => 30),
            array('password', 'length', 'max' => 22),
            array('email', 'length', 'max' => 100),
            array('email', 'email'),
            array('a_id', 'default', 'setOnEmpty' => false, 'value' => 0),
            //array('level', 'default', 'setOnEmpty' => false, 'value' => 2),
            array('create_time', 'default', 'setOnEmpty' => false, 'value' => date("Y-m-d H:i:s"), 'on' => 'insert'),
            array('update_time', 'default', 'setOnEmpty' => false, 'value' => date("Y-m-d H:i:s"), 'on' => 'update'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, username, password, email, active, level, create_time, update_time', 'safe', 'on' => 'search'),
        );
    }

 /*    public function defaultScope()
    {
        return array(
            'condition' => 'level=2',
        );
    }
 */
    public function beforeSave()
    {
        if (!empty($this->password)) {
            $this->password = $this->hashPassword($this->password);
        }else
            unset($this->password);
        return true;
    }

    public function afterFind()
    {
        if (Yii::app()->controller->id == 'default' && Yii::app()->controller->action->id == 'login') {
            
        }else
            unset($this->password);
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
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('active', $this->active);
        $criteria->compare('level', $this->level);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('update_time', $this->update_time, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}