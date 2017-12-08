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
        $this->rootPath = $path . DIRECTORY_SEPARATOR;

        $this->initPaths();

        $this->register();

    }


    /**
     *初始化系统文件路径
     */
    public function initPaths(){
        $this->appPath = $this->rootPath . 'App' . DIRECTORY_SEPARATOR;

        $this->framePath = $this->rootPath . 'Frame' . DIRECTORY_SEPARATOR;

        $this->confPath = $this->framePath . 'Conf' . DIRECTORY_SEPARATOR;
        $this->funcPath = $this->framePath . 'functions' . DIRECTORY_SEPARATOR;
        $this->libPath = $this->framePath . 'Library' . DIRECTORY_SEPARATOR;
    }

    /**
     *默认注册函数，注册自动加载和错误处理
     */
    public function register(){
        spl_autoload_register("Frame\Library\Autoload::autoload");

        $file = new File();
        $this->requireFunctions($file);

        $error = new Error();
        $error->register_shutdown_function();
        $error->set_error_handler();
        $error->set_exception_handler();
    }

    /**
     * 包含所有方法文件夹下的方法文件
     * @param File $file
     */
    public function requireFunctions(File $file){
        $function_files = $file->getFiles($this->funcPath);
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