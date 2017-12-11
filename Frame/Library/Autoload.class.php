<?php
/**
 * Creator: xie
 * Time: 2017/12/5 16:26
 */

namespace Frame\Library;

/**
 * 自动加载类
 * Class Autoload
 * @package Frame\Library
 */
class Autoload
{

    protected $rootPath;

    protected $appPath;

    protected $framePath;
    protected $confPath;
    protected $funcPath;
    protected $libPath;


    public function __construct($path)
    {

        $this->initPaths($path);

        $this->register();

    }


    /**
     *初始化系统文件路径
     */
    public function initPaths($path){

        define('ROOT_PATH',$path . DIRECTORY_SEPARATOR);

        define('APP_PATH',ROOT_PATH . 'App' . DIRECTORY_SEPARATOR);

        define('FRAME_PATH',ROOT_PATH . 'Frame' . DIRECTORY_SEPARATOR);
        define('CONF_PATH',FRAME_PATH . 'Conf' . DIRECTORY_SEPARATOR);
        define('FUNC_PATH',FRAME_PATH . 'functions' . DIRECTORY_SEPARATOR);
        define('LIB_PATH',FRAME_PATH . 'Library' . DIRECTORY_SEPARATOR);
    }

    /**
     *默认注册函数，注册自动加载和错误处理
     */
    public function register(){
        spl_autoload_register("Frame\Library\Autoload::autoload");

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
        $function_files = File::getFiles($this->funcPath);
        foreach ($function_files as $function_file){
            require $this->funcPath . $function_file;
        }
    }

    /**
     * 自动加载函数
     * @param $class
     * @throws \Exception
     */
    public function autoload($class){
        $class .= '.class.php';
        $file = $this->rootPath . '\\'. $class;
        if (is_file($file)){
            require $file;
        }else{
            throw new \Exception('文件[' . $file .']不存在',0);
        }
    }

}