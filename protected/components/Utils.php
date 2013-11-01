<?php

class Utils
{
    /**
     * Get path of the data folder using for view files
     */
    public static function dataViewPath($subPath = '')
    {
        return poa('app.widgets._data' . (empty($subPath) ? '' : ".{$subPath}"));
    }


    /**
     * Get a sub-set of an array by keys
     * @param array $array original array
     * @param array $keys sub-set keys
     */
    public static function subArrayByKeys($array, $keys)
    {
        $tmpArray = array();
        if (is_array($array) && is_array($keys)) {
            foreach ($keys as $key)
                $tmpArray[$key] = $array[$key];
        }
        return $tmpArray;
    }

    /**
     * Ajax validation for a specific form
     */
    public static function ajaxValidation($model, $formId = '')
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === $formId) {
            echo CActiveForm::validate($model);
            app()->end();
        }
    }

    /**
     * An extend method for the built-in md5
     * @return string 32 bytes string
     */
    public static function encrypt($str)
    {
        if ($str)
            $str = md5($str . param('salt'));
        return $str;
    }

    /**
     *
     * Create a folder if it not exist
     * @param string $path
     */
    public static function mkdir($path)
    {
        if (!is_dir($path)) {
            mkdir($path, 0777);
            chmod($path, 0777);
        }
    }

    /**
     * @desc remove folder
     * @param type $dir
     */
    public static function removeDir($dir, $rmRoot = true)
    {
        foreach (glob($dir . '/*') as $file) {
            if (is_dir($file))
                self::removeDir($file);
            else
                unlink($file);
        }
        if ($rmRoot)
            rmdir($dir);
    }

    /**
     * @Desc cut string by space break
     * @param <type> $str
     * @param <type> $len
     * @param <type> $more
     * @return string
     */
    public static function cutString($str, $len, $more = "...")
    {
        if ($str == "" || $str == NULL)
            return $str;
        if (is_array($str))
            return $str;
        $str = trim($str);
        if (strlen($str) <= $len)
            return $str;
        $str = substr($str, 0, $len);
        if ($str != "") {
            if (!substr_count($str, " ")) {
                if ($more)
                    $str .= " " . $more;
                return $str;
            }
            while (strlen($str) && ($str[strlen($str) - 1] != " ")) {
                $str = substr($str, 0, -1);
            }
            $str = substr($str, 0, -1);
            if ($more)
                $str .= " " . $more;
        }
        return $str;
    }

    /**
     * @desc check valid email
     * @param type $email
     * @return type
     */
    public static function isValidEmail($email)
    {
        return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email);
    }

    /**
     * Get path to a specific upload folder
     * @param string $subPath
     */
    public static function uploadPath($subPath = null)
    {
        $path = poa('www_common') . '/upload/';
        return empty($subPath) ? $path : ($path . $subPath);
    }

    /**
     * Get public url to a specific upload folder
     * @param unknown_type $subPath
     */
    public static function uploadUrl($subPath = null)
    {
        $url = app()->request->getHostInfo() . '/common/upload/';
        return empty($subPath) ? $url : ($url . $subPath);
    }

    /**
     * @param array $array
     * @return array
     */
    public static function makeKeysForArray($array, $except = array())
    {
        $res = array();
        foreach ($array as $item) {
            if (!in_array($item, $except))
                $res[$item] = ucfirst($item);
        }
        return $res;
    }
}