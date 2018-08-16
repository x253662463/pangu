<?php
/**
 * Creator: xie
 * Time: 2017/11/17 11:34
 */

/**
 * 项目入口文件
 */

//判断系统版本不小于7.0
if (version_compare('7.0', PHP_VERSION, '>=')) {
    exit("need version >= 7.0.0,your version:" . PHP_VERSION);
}

//引入框架
require __DIR__ . '/../Pangu/start.php';

