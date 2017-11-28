<?php
/**
 * Creator: xie
 * Time: 2017/11/17 15:18
 */

namespace Frame;

/**
 * 框架主类
 * Class App
 * @package Frame
 */
Class App {

    /**
     *程序默认运行函数
     */
    static public function run()
    {
        require ROOT_DIR . '/Frame/common/functions.php';
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
    public static function autoload($class){
        $class = str_replace('Frame\\','',$class);
        if (strpos($class,'\\')){
            $folder = str_replace('\\','/',$class) . '.class.php';
        }else{
            $folder = $class . '.class.php';
        }
        $folder = ROOT_DIR . '\\'. $folder;
        if (is_file($folder)){
            require $folder;
        }else{
            throw new \Exception('not found',0);
        }
    }

    /**
     * 框架路由处理函数
     */
    public static function router(){

        $input = filter($_REQUEST);

        $Controller = isset($input['controller']) ? $input['controller'] : 'Index';
        $action = isset($input['action']) ? $input['action'] : 'index';

        $controller = 'Controllers\\' . $Controller . 'Controller';

        $controller = new $controller();
        $controller->$action();
    }

    /**
     *系统错误函数
     */
    public static function fetalError(){
        if ($e = error_get_last()){
            ob_end_clean();
            echo "Error Message:" . $e['message'] . "<br>";
            echo "Error File:" . $e['file'] . "<br>";
            echo "Error Line:" . $e['line'] . "<br>";
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
        echo "Error Message:" . $errstr . "<br>";
        echo "Error File:" . $errfile . "<br>";
        echo "Error Line:" . $errline . "<br>";
    }

    /**
     * 异常处理函数
     * @param \Exception $e
     */
    public static function Exception(\Exception $e){
        echo "Error Message:" . $e->getMessage() . "<br>";
        echo "Error File:" . $e->getFile() . "<br>";
        echo "Error Line:" . $e->getLine() . "<br>";
    }

}