<?php

/**
 * This is the model class for table "role".
 *
 * The followings are the available columns in table 'role':
 * @property integer $id
 * @property integer $aid
 * @property string $name
 *
 * The followings are the available model relations:
 * @property User $a
 * @property RolePermission[] $rolePermissions
 */
class Role extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Role the static model class
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
		return 'role';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>100),
			array('aid','default','setOnEmpty'=>false,'value'=>Yii::app()->user->id),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, aid, name', 'safe', 'on'=>'search'),
		);
	}

	public function defaultScope()
	{
		
		return array(
			'condition'=>'aid=:aid',
			'params'=>array(
				':aid'=>Yii::app()->user->id,
			),
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
			'a' => array(self::BELONGS_TO, 'User', 'aid'),
			'rolePermissions' => array(self::HAS_MANY, 'RolePermission', 'rid'),
			'rolePermission' => array(self::HAS_ONE, 'RolePermission', array('rid'=>'rid'), 
				'condition'=>'controller=:controller',
				'params'=>array(
					':controller'=>Yii::app()->controller->id,
				)
			),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'aid' => 'Aid',
			'name' => 'Name',
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
		$criteria->compare('aid',$this->aid);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}