<?php
/**
 * Creator: xie
 * Time: 2017/12/8 13:47
 */

namespace Pangu\Library;


class Error
{

    public function register_shutdown_function(){
        register_shutdown_function('Pangu\Library\Error::fetalError');
    }

    public function set_error_handler(){
        set_error_handler('Pangu\Library\Error::error');
    }

    public function set_exception_handler(){
        set_exception_handler('Pangu\Library\Error::exception');
    }

    /**
     *系统错误函数
     */
    public static function fetalError(){
        if ($e = error_get_last()){
            ob_end_clean();
            errorOutput('fetalError',$e['type'],$e['message'],$e['file'],$e['line']);
        };
    }

    /**
     * 系统错误处理函数
     * @param $errno
     * @param $errstr
     * @param $errfile
     * @param $errline
     */
    public static function error($errno, $errstr, $errfile, $errline){
        errorOutput('error',$errno,$errstr,$errfile,$errline);
    }

    /**
     * 异常处理函数
     * @param \Exception $e
     */
    public static function exception($e){
        errorOutput('exception',$e->getCode(),$e->getMessage(),$e->getFile(),$e->getLine());
    }

}