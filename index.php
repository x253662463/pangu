<?php
/**
 * Creator: xie
 * Time: 2017/11/17 11:34
 */


define('ROOT_DIR',dirname(__FILE__) . DIRECTORY_SEPARATOR);

date_default_timezone_set('PRC');

require 'Frame\App.class.php';
\Frame\App::run();

