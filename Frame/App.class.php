<?php
/**
 * Creator: xie
 * Time: 2017/11/17 15:18
 */

namespace Frame;
use Frame\Library\Autoload;

/**
 * 框架主类
 * Class App
 * @package Frame
 */
Class App {

    const VERSION = '0.0.0';

    protected $rootPath;

    protected $paths;

    public function __construct($rootPath){
        $this->rootPath = $rootPath . DIRECTORY_SEPARATOR;
        $this->run();
    }


    public function initPaths(){
        $this->paths['Frame'] = $this->rootPath . 'Frame' . DIRECTORY_SEPARATOR;

        $this->paths['Frame'] = $this->rootPath . 'Frame';
        $this->paths['Frame'] = $this->rootPath . 'Frame';
        $this->paths['Frame'] = $this->rootPath . 'Frame';
        $this->paths['Frame'] = $this->rootPath . 'Frame';
    }

    /**
     *程序默认运行函数
     */
    public function run(){

        require  $this->rootPath . '/Frame/common/functions.php';
        spl_autoload_register('Frame\APP::autoload');

        register_shutdown_function('Frame\APP::fetalError');
        set_error_handler('Frame\APP::Error');
        set_exception_handler('Frame\APP::Exception');

        self::router();


    }

    /**
     * 自动加载函数
     * @param $class
     * @throws \Exception
     */
    public function autoload($class){
        $class .= '.class.php';
        $folder = $this->rootPath . '\\'. $class;
        if (is_file($folder)){
            require $folder;
        }else{
            throw new \Exception('文件[' . $folder .']不存在',0);
        }
    }

    /**
     * 框架路由处理函数
     */
    public static function router(){

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