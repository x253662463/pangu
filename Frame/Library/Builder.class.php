<?php
/**
 * Creator: xie
 * Time: 2017/12/8 17:14
 */

namespace Frame\Library;


class Builder
{
    //项目的根目录
    protected $appPath;

    public function __construct($appName){

        $appName = ucfirst($appName);

        $this->appPath = ROOT_PATH . $appName . DIRECTORY_SEPARATOR;

        $appDirs = array(
            $this->appPath . '/Controllers/',
            $this->appPath . '/Models/',
            $this->appPath . '/Conf/',
            $this->appPath . '/Views/',
        );

        $this->generateDirs($appDirs);
    }

    /**
     * 根据数组生成文件目录
     * @param $appDirs
     */
    public function generateDirs($appDirs){
        foreach ($appDirs as $dir){
            $this->generatePath($dir);
        }
    }

    /**
     * 生成路径
     * @param $path
     */
    public function generatePath($path){
        if (is_dir($path)){
            return;
        }else{
            if (!mkdir($path,null,true)){
                //TODO:报错信息
                echo "创建文件夹失败，权限不足";
            }
        }
    }


}