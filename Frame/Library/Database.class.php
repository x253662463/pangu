<?php
/**
 * Creator: xie
 * Time: 2017/11/28 16:06
 */
namespace Frame\Library;

class Database
{
    private static $database = null; //

    /**
     * @param $type //数据库类型：mysql等等
     * @param $options //数据库连接参数
     * @return object 数据库实例
     */
    static public function setDatabase($type, $options){
        if (!isset(self::$database)){
            $type = "Frame\\Library\\Database\\" . $type;
            self::$database = new $type($options);
        }
        return self::$database;
    }

}