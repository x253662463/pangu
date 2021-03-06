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
    header("Content-type: json; charset=json");
    $return = [
        'code' => $errorNum,
        'message' => $title,
        'data' => [
            'message' => $message,
            'file' => $file,
            'line' => $line
        ]
    ];
    die(json_encode($return));
}


function getRealIp(){
    //TODO:重写获取真正ip地址函数
    return "127.0.0.1";
}