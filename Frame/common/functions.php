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
 * @return string
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