<?php
/**
 * 公共函数库
 * @param $params
 * @return string
 */

/**
 * 过滤输入的参数
 * TODO:初步过滤，应该还有其他要过滤的内容
 * @param $array,$tring  需要过滤的参数
 * @return mixed
 */
function filter($params){
    if (is_array($params)){
        foreach ($params as $key => $param){
            $params[filter($key)] = filter($param);
        }
    }else{
        $params = htmlspecialchars($params);
    }
    return $params;
}


/**
 * 格式化错误输出
 * @param $title string 错误标题
 * @param $errorNum int 错误号
 * @param $message string 错误信息
 * @param $file string 错误文件位置
 * @param $line int 错误行数
 */
function errorOutput($title, $errorNum, $message, $file, $line){
    header("Content-type: text/html; charset=utf-8");
    echo "<h1>$title</h1>";
    echo "Error Number:" . $errorNum . "<br>";
    echo "Error Message:" . $message . "<br>";
    echo "Error File:" . $file . "<br>";
    echo "Error Line:" . $line . "<br>";
}