<?php
/**
 * Creator: xie
 * Time: 2017/12/4 10:42
 */

namespace Frame\Library;


class File
{
    /**
     * 获取目录文件下多有的文件名
     * @param $dir
     * @return 2|array
     */
    public static function getFiles($dir){
        return array_slice(scandir($dir),2);
    }
}