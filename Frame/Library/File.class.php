<?php
/**
 * Creator: xie
 * Time: 2017/12/4 10:42
 */

namespace Frame\Library;

/*
 * 文件处理类
 */
use Exception;

class File
{
    public function isFile($file){
        if (is_file($file)){
            return true;
        }
        throw new Exception("文件为找到");
//        }catch (Exception $e){
//            errorOutput("文件系统错误",$e->getCode(),$e->getMessage(),$e->getFile(),$e->getLine());
//        }
//        return false;
    }
    //TODO:获取文件时是否加锁，目前对锁机制不是很了解
    public function get($file){
        echo "123";
        var_dump($this->isFile($file));
        if ($this->isFile($file)){
            echo "hello world";
            return file_get_contents($file);
        }
    }

    public function getRequire($file){

    }
}