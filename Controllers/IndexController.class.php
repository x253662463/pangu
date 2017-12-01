<?php
namespace Controllers;
use Models\Name;

/**
 * Creator: xie
 * Time: 2017/11/23 17:46
 */

class IndexController extends Controller
{


    public function index(){

//        $model = new Name();
        $this->assign(array('contain' => '进入了'));
        $this->show();
    }

    public function second(){
        $this->show();
        echo 'second';
    }
}