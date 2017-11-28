<?php
/**
 * Creator: xie
 * Time: 2017/11/28 16:06
 */
namespace Frame\Library;

class Database
{
    private static $database = null; //

    static public function setDatabase($type,$options){
        if (!isset(self::$database)){
            $type = "Frame\\Library\\Database\\" . $type;
            self::$database = new $type($options);
        }
        return self::$database;
    }

}