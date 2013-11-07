<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 * 
 * level = 1 , user
 * level = 2 , manager
 * level = 3 , admin
 */
class UserIdentity extends CUserIdentity
{

    public $_id;

    const ERROR_STATUS_NOTACTIVE = 4;

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
        $user = User::model()->findByAttributes(array('username' => $this->username));
        
        if (!isset($user->username)) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if ($user->hashPassword($this->password) !== $user->password) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else if ($user->active != 1)
            $this->errorCode = self::ERROR_STATUS_NOTACTIVE;
        else {
            $this->errorCode = self::ERROR_NONE;

            $this->_id = $user->id;

            //User::model()->updateByPk($user->id,array('last_login'=>date("Y-m-d H:i:s"),'last_ip'=>Yii::app()->request->userHostAddress));
        }
        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }

}