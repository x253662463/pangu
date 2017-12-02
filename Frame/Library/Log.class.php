<?php
/**
 * Creator: xie
 * Time: 2017/12/2 20:57
 */

namespace Frame\Library;


class Log
{
    public $log_path = 'storage/logs';

    public static function write($message,$log_name = null){
        if (is_null($log_name)){
            $log_name = ROOT_DIR . 'storage/logs/log_' . date('Y-m-d') . '.log';
        }else{
            $log_name = ROOT_DIR . $log_name;
        }
        $log_path = dirname($log_name);
        if (!is_dir($log_path)){
            mkdir($log_path,0755,true);
        }
        $log_message = "["  . date('Y-m-d  G:i:s'). "]" . getRealIp() . " "
            . $_SERVER['REQUEST_URI'] . "\r\n" . $message . "\r\n";
        error_log($log_message,3,$log_name);

    }
}