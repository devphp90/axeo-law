<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class BackendUserIdentity extends UserIdentity
{
	public $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = Account::model()->find('LOWER(username)=?', array(strtolower($this->username)));


		if(!isset($user->username))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($user->hashPassword($this->password)!==$user->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
			$this->errorCode=self::ERROR_NONE;
			$this->_id = $user->id;
			//User::model()->updateByPk($user->id,array('last_login'=>date("Y-m-d H:i:s"),'last_ip'=>Yii::app()->request->userHostAddress));
		}

		return !$this->errorCode;
	}
	
}