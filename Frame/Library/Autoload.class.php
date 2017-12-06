<?php
/**
 * Creator: xie
 * Time: 2017/12/5 16:26
 */

namespace Frame\Library;


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


    public function initPaths(){
        $this->appPath = $this->rootPath . 'App' . DIRECTORY_SEPARATOR;

        $this->framePath = $this->rootPath . 'Frame' . DIRECTORY_SEPARATOR;
        $this->confPath = $this->framePath . 'Conf' . DIRECTORY_SEPARATOR;
        $this->funcPath = $this->framePath . 'functions' . DIRECTORY_SEPARATOR;
        $this->libPath = $this->framePath . 'Library' . DIRECTORY_SEPARATOR;
    }

    public function register(){
        spl_autoload_register("Frame\Library\Autoload::autoload");

        $this->requireFunctions();
    }

    public function requireFunctions(){
        //TODO:需要修改为自动查找方法文件目录下的所有文件
        require $this->funcPath . 'functions.php';
    }

    /**
     * 自动加载函数
     * @param $class
     * @throws \Exception
     */
    public function autoload($class){

        //TODO:这个方法只限于框架内的类，app内部的类逻辑需要修改
        $class .= '.class.php';
        $folder = $this->rootPath . '\\'. $class;
        if (is_file($folder)){
            require $folder;
        }else{
            throw new \Exception('文件[' . $folder .']不存在',0);
        }
    }

}