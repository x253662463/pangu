<?php
/**
 * Creator: xie
 * Time: 2017/12/5 16:26
 */

namespace Pangu\Library;

/**
 * 自动加载类
 * Class Autoload
 * @package Frame\Library
 */
class Autoload
{
    public function __construct()
    {
        $this->register();
    }

    /**
     *默认注册函数，注册自动加载和错误处理
     */
    public function register(){
        spl_autoload_register("Pangu\Library\Autoload::autoload");

        $this->requireFunctions();

        $error = new Error();
        $error->register_shutdown_function();
        $error->set_error_handler();
        $error->set_exception_handler();
    }

    /**
     * 包含所有方法文件夹下的方法文件
     * @param File $file
     */
    public function requireFunctions(){
        $function_files = File::getFiles(PANGU_FUNC);
        foreach ($function_files as $function_file){
            require PANGU_FUNC . $function_file;
        }
    }

    /**
     * 自动加载函数
     * @param $class
     * @throws \Exception
     */
    public function autoload($class){
        $class .= '.class.php';
        $file = PANGU_ROOT . '\\'. $class;
        if (is_file($file)){
            require $file;
        }else{
            throw new \Exception('File [' . $file .'] doesn\'t exist',4001);
        }
    }

}