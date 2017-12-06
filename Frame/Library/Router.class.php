<?php
/**
 * Creator: xie
 * Time: 2017/12/6 17:10
 */

namespace Frame\Library;


class Router
{
    public function run(){
        $input = filter($_REQUEST);

        $Controller = isset($input['controller']) ? $input['controller'] : 'Index';
        $Action = isset($input['action']) ? $input['action'] : 'index';

        define('CONTROLLER_NAME',$Controller);
        define('ACTION_NAME',$Action);

        $controller = 'Controllers\\' . $Controller . 'Controller';

        $controller = new $controller();
        //TODO:控制器和方法不存在的时候调整报错信息
        $controller->$Action();
    }

}