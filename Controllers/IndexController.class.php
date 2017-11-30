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

        $model = new Name();
        echo $model->getModelName();
    }

    public function second(){
        echo 'second';
    }
}