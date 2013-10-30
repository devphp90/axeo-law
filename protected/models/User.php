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
class User extends CActiveRecord
{
	public $hash = '^#@=';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('password','required','on'=>'insert'),
			array('username, email, active', 'required'),
			array('username','unique'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>30),
			array('password', 'length', 'max'=>22),
			array('firstname, middlename, lastname, phone,skype' , 'length', 'max'=>20),
			array('email,address', 'length', 'max'=>100),
			array('email','email'),
			array('level','default','setOnEmpty'=>false,'value'=>1),
			array('create_time','default','setOnEmpty'=>false,'value'=>date("Y-m-d H:i:s"),'on'=>'insert'),
			array('update_time','default','setOnEmpty'=>false,'value'=>date("Y-m-d H:i:s"),'on'=>'update'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, email, active, level, create_time, update_time', 'safe', 'on'=>'search'),
		);
	}

	public function defaultScope()
	{
		return array(
			'condition'=>'level=1',
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


	public function hashPassword( $password )
	{
		return md5($this->hash.$password.$this->hash);
	}
	
	public function getParentId($uid)
	{
		return User::model()->findByPk($uid)->a_id;
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'active' => 'Active',
			'level' => 'Level',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
		);
	}

	public function beforeSave()
	{
		if(!empty($this->password)){
			$this->password = $this->hashPassword($this->password);
		}else
			unset($this->password);
			
		if(Yii::app()->user->isAccount())
			$this->a_id = Yii::app()->user->id;
			
		return true;
	}
	
	public function afterFind()
	{
		if(Yii::app()->controller->id == 'site' && Yii::app()->controller->action->id == 'login'){
			
			
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('level',$this->level);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
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

		$criteria=new CDbCriteria;

		$criteria->condition = 'a_id=:a_id';
		$criteria->params = array(
			':a_id'=>Yii::app()->user->id
		);
		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('level',$this->level);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function roleSearch($uid)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->condition = 'uid=:uid';
		$criteria->params = array(
			':uid'=>$uid
		);


		return new CActiveDataProvider('UserRole', array(
			'criteria'=>$criteria,
		));
	}
	
	
	
	
	
	
}