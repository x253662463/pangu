<?php
/**
 * Creator: xie
 * Time: 2017/12/7 13:47
 */

namespace Frame\Library;


class Request
{

    protected $url;

    protected $controller;

    protected $action;

    public function __construct()
    {
        $params = $_REQUEST;

        $this->controller = isset($params['controller']) ? $params['controller'] : 'index';
        $this->action = isset($params['action']) ? $params['action'] : 'index';
    }

    /**
     * 获取请求的控制器
     * @return mixed
     */
    public function getController(){
        return ucfirst(strtolower($this->controller));
    }

    /**
     * 获取请求的方法
     * @return mixed
     */
    public function getAction(){
        return $this->action;
    }
}