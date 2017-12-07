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

    /**
     *系统错误函数
     */
    public static function fetalError(){
        if ($e = error_get_last()){
            ob_end_clean();
            errorOutput('致命错误',$e['type'],$e['message'],$e['file'],$e['line']);
        };
    }

    /**
     * 系统错误处理函数
     * @param $errno
     * @param $errstr
     * @param $errfile
     * @param $errline
     */
    public static function Error($errno, $errstr, $errfile, $errline){
        errorOutput('系统错误',$errno,$errstr,$errfile,$errline);
    }

    /**
     * 异常处理函数
     * @param \Exception $e
     */
    public static function Exception($e){
        errorOutput('异常',$e->getCode(),$e->getMessage(),$e->getFile(),$e->getLine());
    }

}