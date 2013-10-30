<?php

/**
 * This is the model class for table "customer".
 *
 * The followings are the available columns in table 'customer':
 * @property integer $id
 * @property integer $u_id
 * @property string $name
 * @property string $email
 * @property string $phone
 *
 * The followings are the available model relations:
 * @property User $u
 */
class Customer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Customer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function defaultScope()
	{
		return array(
			'condition'=>'u_id=:u_id',
			'params'=>array(
				':u_id'=>Yii::app()->user->id,
			),
		);
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' name, email, phone', 'required'),
			array('u_id','default','setOnEmpty'=>false,'value'=>Yii::app()->user->id),
			array('name', 'length', 'max'=>50),
			array('email', 'length', 'max'=>100),
			array('email','email'),
			array('phone', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, u_id, name, email, phone', 'safe', 'on'=>'search'),
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
			'u' => array(self::BELONGS_TO, 'User', 'u_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'u_id' => 'U',
			'name' => 'Name',
			'email' => 'Email',
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

		$criteria=new CDbCriteria;
		$criteria->condition = 'u_id=:u_id';
		$criteria->params = array(
			':u_id'=>Yii::app()->user->id
		);
		$criteria->compare('id',$this->id);
		$criteria->compare('u_id',$this->u_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}