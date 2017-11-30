<?php
/**
 * Creator: xie
 * Time: 2017/11/28 17:40
 */

namespace Frame\Library;

use PDO;


abstract class DatabaseDriver
{

    //数据库连接实例
    protected $pdo = null;

    //数据库结果实例
    protected $pdo_result = null;
    //数据库连接操作
    protected $type = '';//数据库类型
    protected $host = '';//主机地址
    protected $dbname = '';//数据库名称
    protected $username = '';//数据库用户名
    protected $password = '';//数据库密码
    protected $driver_options = array();//一个具体驱动的连接选项的键=>值数组

    //数据库执行操作

    protected $sql = '';

    protected $lastId = null;

    protected $numRows = 0;

    protected $error = '';


    /**
     * 连接数据库pdo的操作
     * @return null|PDO
     */
    public function connect(){
        if (!isset($this->pdo)){
            try{
                $dns = $this->type . ":host=" . $this->host . ";dbname=" . $this->dbname;
                $this->pdo = new PDO($dns, $this->username, $this->password,$this->driver_options);
            } catch (\PDOException $e){
                errorOutput("数据库连接错误",$e->getCode(),$e->getMessage(),$e->getFile(),$e->getLine());
            }
        }
        return $this->pdo;
    }

    /**
     * 最基础的query操作
     * @param $sql
     * @return mixed
     */
    public function query($sql){
        $sql = isset($sql) ? $sql : $this->sql;
        $this->pdo_result = $this->pdo->query($sql);
        return $this->fetchAll();
    }

    /**
     * 运行系统的exec操作，返回影响的条数
     * @param $sql
     * @return int
     */
    public function exec($sql){
        $this->numRows = $this->pdo->exec($sql);
        if ($this->numRows == false){
            $this->error();
        }
        return $this->numRows;
    }

    /**
     * 查询结果格式化处理
     * @return mixed
     */
    public function fetchAll(){
        return $this->pdo_result->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     *数据库错误处理
     */
    public function error(){
        $error = $this->pdo->errorInfo();
        errorOutput("数据库错误",$error[0],$error[2],__FILE__,__LINE__);
    }

    //TODO:事务以及多次查询什么的
}