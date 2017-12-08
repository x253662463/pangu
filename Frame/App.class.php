<?php
/**
 * Creator: xie
 * Time: 2017/11/17 15:18
 */

namespace Frame;
use Frame\Library\Request;
use Frame\Library\Router;

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