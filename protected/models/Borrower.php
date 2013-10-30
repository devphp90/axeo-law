<?php

/**
 * This is the model class for table "borrower".
 *
 * The followings are the available columns in table 'borrower':
 * @property integer $id
 * @property string $name
 */
class Borrower extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Borrower the static model class
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
		return 'borrower';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email', 'required'),
			array('email', 'email'),
			array('name', 'length', 'max'=>255),
			array('phone1', 'length', 'max'=>20),
           		array('skype', 'length', 'max'=>100),
           		array('facebookaddress', 'length', 'max'=>150),   //added field for facebookaddress > ishit (softweb) : 10/17/13
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, email, phone1', 'safe', 'on'=>'search'),
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
			'phone1' => 'Phone Number',
			'email' => 'Email',
            		'skype' => 'Skype',
            		'facebookaddress' => 'Facebook Address' //added field for facebookaddress > ishit (softweb) : 10/17/13
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('phone1',$this->phone1,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getNameFilterOptions()
	{
		return CHtml::listData(Borrower::model()->findAll(), 'name', 'name');
	}
}
