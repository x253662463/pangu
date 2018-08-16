<?php
/**
 * Creator: xie
 * Time: 2017/11/29 12:03
 */

namespace Frame\Library;

abstract class Controller
{
    /**
     * 控制器初始化操作
     * Controller constructor.
     */
    public function __construct(){
    }

    public function response($status,$msg,$data){
        ob_end_clean();
        header('Content-type: application/json,charset=utf-8');
        $response = [
            'status' => $status,
            'msg' => $msg,
            'data' => $data
        ];
        die(json_encode($response));
    }

}