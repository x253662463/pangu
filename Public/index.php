<?php
/**
 * Creator: xie
 * Time: 2017/11/17 11:34
 */


require '..\Frame\Library\Autoload.class.php';

new \Frame\Library\Autoload(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);

new \Frame\App(new \Frame\Library\Router());

