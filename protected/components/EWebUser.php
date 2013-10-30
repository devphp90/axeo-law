<?php
/*
*	Level
*		0: normal user
*		1: manager
*		2: admin
*
*/
class EWebUser extends CWebUser
{
	public $model;
	
	public function isAdmin()
	{
		if(Yii::app()->user->isGuest)
			return false;
			
		if($this->getUserLevel() != 3)
			return false;
			
		return true;
	}
	
	public function userAuth($action)
	{
		$permission = $this->userPermission($action);
		
		if($permission === true)
			return true;
		else if($permission === false)
			return false;
			
		$model = UserRole::model()->findByAttributes(array(
			'uid'=>Yii::app()->user->id,
		));
		
		
		if($model==null)
			return false;
		else{
			if($model->rolePermission->$action)
				return true;
			else
				return false;
		}
		
	}
	
	public function userPermission($action)
	{
/*
		$model = UserPermission::model()->findByAttributes(array(
			'controller'=>Yii::app()->controller->id,
			'uid'=>Yii::app()->user->id,
		));	
*/
		
		$row = Yii::app()->db->createCommand(array(
		    'select' => array('*'),
		    'from' => "user_permission",
		    'params' => array(
		    	':controller'=>Yii::app()->controller->id,
		    	':uid'=>Yii::app()->user->id,
		    ),
		    'where'=>'controller=:controller and uid=:uid',
		))->queryRow();
		
		if(empty($row['id']))
			return NULL;
		else
			if($row[$action] == 0)
				return false;
			else
				return true;
	}
	
	public function isAccount()
	{
		if(Yii::app()->user->isGuest)
			return false;
			
		if($this->getUserLevel() != 2)
			return false;
			
		return true;
	}

	public function isUser()
	{
		if(Yii::app()->user->isGuest)
			return false;
			
		if($this->getUserLevel() != 1)
			return false;
			
		return true;
	}
	
	public function getUserLevel()
	{
		$row = Yii::app()->db->createCommand(array(
		    'select' => array('level'),
		    'from' => "user",
		    'params' => array(':id'=>Yii::app()->user->id),
		    'where'=>'id=:id',
		))->queryRow();
		
		return $row['level'];
	}

}
?>