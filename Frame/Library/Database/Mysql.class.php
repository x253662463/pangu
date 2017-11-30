<?php
/**
 * Creator: xie
 * Time: 2017/11/28 16:03
 */
namespace Frame\Library\Database;

use Frame\Library\DatabaseDriver;

class Mysql extends DatabaseDriver
{
    protected $type = 'mysql';

    public function __construct($config){
        $this->host = $config['host'];
        $this->dbname = $config['dbname'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->driver_options = $config['options'];
        $this->connect();
    }
}