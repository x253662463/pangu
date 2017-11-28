<?php
/**
 * Creator: xie
 * Time: 2017/11/17 15:18
 */

namespace Frame;


Class App {

    static public function run()
    {
        require ROOT_DIR . '/Frame/common/functions.php';
        spl_autoload_register('Frame\APP::autoload');

        self::router();


    }

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
            echo "class not found";
        }
    }

    public static function router(){

        $input = filter($_REQUEST);

        $Controller = isset($_REQUEST['controller']) ? $_REQUEST['controller'] : 'Index';
        $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';

        $controller = 'Controllers\\' . $Controller . 'Controller';
        echo $Controller . '->' . $action;

        $controller = new $controller();
        $controller->$action();


    }

}