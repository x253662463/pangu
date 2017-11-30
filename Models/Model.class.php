<?php
/**
 * Creator: xie
 * Time: 2017/11/29 12:02
 */

namespace Models;


use Frame\Library\Database;

class Model
{
    public function __construct()
    {
        $db = Database::setDatabase('mysql',array(
            'host' => 'localhost',
            'dbname' => 'pangu',
            'username' => 'root',
            'password' => 'root',
            'options' => array()
        ));
        var_dump($db);
    }

    public function getModelName(){
        $class = get_class($this);
        if ($pos = strpos($class,'\\')){
            $class = substr($class,$pos + 1);
        }
        return $class;
    }
}