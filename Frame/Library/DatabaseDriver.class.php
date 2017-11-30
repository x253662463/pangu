<?php
/**
 * Creator: xie
 * Time: 2017/11/28 17:40
 */

namespace Frame\Library;

use PDO;


abstract class DatabaseDriver
{

    protected $pdo = null;

    protected $type = '';//数据库类型
    protected $host = '';//主机地址
    protected $dbname = '';//数据库名称
    protected $username = '';//数据库用户名
    protected $password = '';//数据库密码
    protected $driver_options = array();//一个具体驱动的连接选项的键=>值数组

    protected $pdo_attribute = array();
    protected $pdo_fetchmode = array();

    public function connect(){
        try{
            $dns = $this->type . ":host=" . $this->host . ";dbname=" . $this->dbname;
            $this->pdo = new PDO($dns, $this->username, $this->password,$this->driver_options);
        } catch (\PDOException $e){
            errorOutput("数据库连接错误",$e->getCode(),$e->getMessage(),$e->getFile(),$e->getLine());
        }
    }

}