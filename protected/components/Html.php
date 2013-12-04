<?php
/**
 * User: Ceres LLC
 * Date: 6/2/13
 * Time: 4:19 PM
 */
class Html extends CHtml
{
    public static function enumDropDownList($model, $attribute, $htmlOptions = array())
    {
        return self::activeDropDownList($model, $attribute, self::enumItem($model, $attribute), $htmlOptions);
    }

    public static function enumItem($model, $attribute)
    {
        $attr = $attribute;
        self::resolveName($model, $attr);
        preg_match('/\((.*)\)/', $model->tableSchema->columns[$attr]->dbType, $matches);
        foreach (explode(',', $matches[1]) as $value) {
            $value = str_replace("'", null, $value);
            $values[$value] = Yii::t('enumItem', $value);
        }
        return $values;
    }

    public static function createDynamicField($type, $name, $value, $collection = array(), $htmlOptions = array())
    {
        switch ($type) {
            case 'Boolean':
                return self::radioButtonList($name, $value, array('Yes' => 'Yes', 'No' => 'No'), array('separator' => ' '));
                break;
            case 'Content':
                return self::textArea($name, $value, $htmlOptions);
                break;
            case 'Collection':
                return self::dropDownList($name,$value, $collection,$htmlOptions);
                break;
            default :
                return self::textField($name,$value,$htmlOptions);
        }
    }
}