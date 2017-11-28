<?php
/**
 * Creator: xie
 * Time: 2017/11/28 16:03
 */
namespace Frame\Library\Database;

use Frame\Library\DatabaseDriver;

class Mysql extends DatabaseDriver
{
    public function __construct($config)
    {
        $this->config = $config;
        $this->connect();
    }
}