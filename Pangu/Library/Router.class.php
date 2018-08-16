<?php
/**
 * Creator: xie
 * Time: 2017/12/6 17:10
 */

namespace Pangu\Library;


class Router
{
    private static $method = [
        'get',
        'post',
        'put',
        'delete',
        'patch'
    ];

    private static $restful = [
        'index'
    ];

    public function __construct(){

        //TODO:这个是要从配置文件中获取的
        $appPath = 'App';

        if (!is_dir(ROOT_PATH . $appPath)){
            $buider = new Builder($appPath);
            $buider->generateApp();
        }

        $this->controllerPath = $appPath . DIRECTORY_SEPARATOR . 'Controllers' . DIRECTORY_SEPARATOR;


    }

    /**
     * 路由调度方法
     * @param Request $request
     */
    public function dispatch(Request $request){

        $controller = $request->getController();
        $action = $request->getAction();

        $controller = $this->getFullController($controller);

        $this->checkAction($controller,$action);

        $controller = new $controller();
        $controller->$action();
    }

    /**
     * 获取完整的控制器类名
     * @param $controller
     * @return bool|string
     */
    public function getFullController($controller){
        $fullController = $this->controllerPath . $controller;
        if (class_exists($fullController)){
            return $fullController;
        }else{
            //TODO:应该直接提示报错信息
            return false;
        }
    }

    /**
     * 判断控制器中方法是否存在
     * @param $controller
     * @param $action
     * @return bool
     */
    public function checkAction($controller, $action){
        if (method_exists($controller,$action)){
            return true;
        }else{
            //TODO:应该直接提示报错信息
            return false;
        }
    }

}