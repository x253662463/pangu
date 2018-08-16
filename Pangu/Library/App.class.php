<?php
/**
 * Creator: xie
 * Time: 2017/11/17 15:18
 */

namespace Pangu\Library;
use Pangu\Library\Request;
use Pangu\Library\Router;

/**
 * 框架主类
 * Class App
 * @package Frame
 */
Class App {

    const VERSION = '0.0.0';

    public function __construct(Router $router){
        $router->dispatch(new Request());
    }

}