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
    /**
     *默认注册函数，注册自动加载和错误处理
     */
    public static function register()
    {
        spl_autoload_register("Pangu\Library\Autoload::autoload");

        self::requireFunctions();

        Error::register_shutdown_function();
        Error::set_error_handler();
        Error::set_exception_handler();
    }

    /**
     * 包含方法文件夹下的方法文件
     * @param File $file
     */
    public static function requireFunctions()
    {
        $function_files = File::getFiles(PANGU_FUNC);
        foreach ($function_files as $function_file) {
            require PANGU_FUNC . $function_file;
        }
    }

    /**
     * 自动引入文件函数
     * @param $class
     * @throws \Exception
     */
    public static function autoload($class)
    {
        $class .= '.class.php';
        $file = PANGU_ROOT . '\\' . $class;
        if (is_file($file)) {
            require $file;
        } else {
            throw new \Exception('File [' . $file . '] doesn\'t exist', 4001);
        }
    }

}