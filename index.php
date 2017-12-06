<?php
/**
 * Creator: xie
 * Time: 2017/11/17 11:34
 */


require 'Frame\Library\Autoload.class.php';

new \Frame\Library\Autoload(dirname(__FILE__));


$router = new \Frame\Library\Router();

new \Frame\App($router);

