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
        return false;
    }
    //TODO:获取文件时是否加锁，目前对锁机制不是很了解
    public function get($file){
        if ($this->isFile($file)){
            return file_get_contents($file);
        }
        return false;
    }

    public function getRequire($file){
        if ($this->isFile($file)){
            require $file;
        }
    }
}