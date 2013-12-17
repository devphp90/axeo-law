<?php

class ActiveRecord extends CActiveRecord
{
    const STATUS_DEACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETE = 2;

    /**
     * @desc set created time for a record
     * @return type 
     */
    protected function beforeSave()
    {
        if ($this->isNewRecord) {
            if ($this->hasAttribute('created_date')) {
                if (empty($this->created_date))
                    $this->created_date = time();
            }
        }
        if ($this->hasAttribute('updated_date'))
            $this->updated_date = time();
        if ($this->hasAttribute('status') && is_null($this->status))
            $this->status = self::STATUS_ACTIVE;
        return parent::beforeSave();
    }

    /**
     * @desc check attribute birthday valid
     * @param type $attribute
     * @param type $params 
     */
    public function checkBirthday($attribute, $params)
    {
        if (strtotime($this->{$attribute}) > time()) {
            $this->addError($attribute, 'Birthday not be greater than current date');
        }
        if ($this->$attribute == "")
            $this->$attribute = null;
    }

    /**
     * @desc check time is greater than current
     * @param type $attribute
     * @param type $params 
     */
    public function checkGreaterCurrent($attribute, $params)
    {
        $labels = $this->attributeLabels();
        if (strtotime($this->{$attribute}) < time()) {
            $this->addError($attribute, $labels[$attribute] . ' must be greater than current date');
        }
    }

    /**
     * @desc check time is before current
     * @param type $attribute
     * @param type $params 
     */
    public function checkLessThanCurrent($attribute, $params)
    {
        $labels = $this->attributeLabels();
        if (strtotime($this->{$attribute}) > time()) {
            $this->addError($attribute, $labels[$attribute] . ' must be before current date');
        }
    }

    public function checkBeforeTime($attribute, $params)
    {
        $labels = $this->attributeLabels();
        if (strtotime($this->{$attribute}) > strtotime($this->{$params['compareAttribute']}))
            $this->addError($attribute, $labels[$attribute] . ' must be before ' . $labels[$params['compareAttribute']]);
    }

    public function getStatusOptions()
    {
        return array(
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_DEACTIVE => 'In Active',
            self::STATUS_DELETE => 'Deleted',
        );
    }

    public function getStatusText()
    {
        $options = $this->getStatusOptions();
        return (isset($options[$this->status]) ? $options[$this->status] : 'Unknown');
    }

}