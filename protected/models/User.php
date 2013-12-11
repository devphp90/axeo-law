<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property integer $office_id
 * @property string $username
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property integer $role_id
 * @property string $password
 * @property string $email
 * @property integer $active
 * @property integer $level
 * @property string $create_time
 * @property string $update_time
 */
class User extends ActiveRecord
{
    const TYPE_USER = 1;
    const TYPE_ACCOUNT = 2;
    
    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;
    const ROLE_SUPER_ADMIN = 3;

    public $hash = '^#@=';

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
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'users';
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
            array('active, office_id, level, role_id', 'numerical', 'integerOnly' => true),
            array('username', 'length', 'max' => 30),
            array('password', 'length', 'max' => 22),
            array('first_name, middle_name, last_name, phone,skype', 'length', 'max' => 20),
            array('email, address', 'length', 'max' => 100),
            array('email', 'email'),
            array('created_time', 'default', 'setOnEmpty' => false, 'value' => date("Y-m-d H:i:s"), 'on' => 'insert'),
            array('updated_time', 'default', 'setOnEmpty' => false, 'value' => date("Y-m-d H:i:s"), 'on' => 'update'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('role_id', 'safe'),
            array('id, office_id, username, first_name, middle_name, last_name, password, email, active, level, created_time, updated_time', 'safe', 'on' => 'search'),
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

    public function hashPassword($password)
    {
        return md5($this->hash . $password . $this->hash);
    }

    public function getParentId($uid)
    {
        return User::model()->findByPk($uid)->office_id;
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'username' => 'Username',
            'role_id' => 'Role',
            'password' => 'Password',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'active' => 'Active',
            'level' => 'Level',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
        );
    }

    public function beforeSave()
    {
        $parent = parent::beforeSave();
        
        if (!empty($this->password)) {
            $this->password = $this->hashPassword($this->password);
        } else
            unset($this->password);

        return $parent;
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
        
        $criteria->condition = 'office_id = :officeId';
        
        if (user()->isSuperAdmin())
            $criteria->params = array(':officeId' => 0);
        
        if (user()->isAdmin()) {
            $criteria->params = array(':officeId' => user()->officeId);
            $criteria->condition .= ' OR id = :id';
            $criteria->params[':id'] = user()->id;
        }

        $criteria->compare('id', $this->id);
        $criteria->compare('office_id', $this->office_id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('middle_name', $this->middle_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('role_id', $this->role_id);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('active', $this->active);
        $criteria->compare('level', $this->level);
        $criteria->compare('created_time', $this->created_time, true);
        $criteria->compare('updated_time', $this->updated_time, true);
        
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function accountSearch()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->condition = 'office_id=:office_id';
        $criteria->params = array(
            ':office_id' => user()->officeId,
        );
        $criteria->compare('id', $this->id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('middle_name', $this->middle_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('role_id', $this->role_id);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('active', $this->active);
        $criteria->compare('level', $this->level);
        $criteria->compare('created_time', $this->created_time, true);
        $criteria->compare('updated_time', $this->updated_time, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}