<?php

/*
 * 	Level
 * 		0: normal user
 * 		1: manager
 * 		2: admin
 *
 */

class EWebUser extends CWebUser
{

    public $model;

    public function isSuperAdmin()
    {
        if (Yii::app()->user->isGuest)
            return false;
        
        if ($this->getModel()->level == User::ROLE_SUPER_ADMIN)
            return true;

        return false;
    }
    
    public function getOfficeId()
    {
        $user = User::model()->findByPk(user()->id);
        return $user->office_id;
    }
    
    public function isAdmin()
    {
        if (Yii::app()->user->isGuest)
            return false;
        
        if ($this->getModel()->level == User::ROLE_ADMIN)
            return true;

        return false;
    }
    
    public function getModel()
    {
        if (Yii::app()->user->isGuest)
            return null;
        
        return User::model()->findByPk(user()->id);
    }
    
    public function getRole()
    {
        if (Yii::app()->user->isGuest)
            return 0;
        return $this->getModel()->level;
    }

}

?>