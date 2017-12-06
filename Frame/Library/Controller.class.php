<?php
/**
 * Creator: xie
 * Time: 2017/11/29 12:03
 */

namespace Frame\Library;



use Frame\Library\View;

abstract class Controller
{

    //视图类
    protected $viewData = array();

    /**
     * 控制器初始化操作
     * Controller constructor.
     */
    public function __construct(){
    }

    /**
     * 将数据传入到视图中
     * @param $data
     */
    public function assign($data){
        $this->viewData = array_merge($this->viewData,$data);
    }

    /**
     *展示视图
     */
    public function show(){
        if ($this->viewData){
            foreach ($this->viewData as $key => $value){
                $$key = $value;
            }
        }
        ob_start();
        ;
        if (is_file(ROOT_DIR . '/Views/' . CONTROLLER_NAME .'/'. ACTION_NAME . '.php')){
            include ROOT_DIR . '/Views/' . CONTROLLER_NAME .'/'. ACTION_NAME . '.php';
        }else{
            errorOutput("视图未找到",0, "未找到视图文件：" . ROOT_DIR . '/Views/' . CONTROLLER_NAME .'/'. ACTION_NAME . '.php',__FILE__,__LINE__);
        }
        $content = ob_get_clean();
        echo $content;
    }

}