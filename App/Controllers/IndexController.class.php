<?php
namespace App\Controllers;
use Frame\Library\Controller;
use Frame\Library\File;
use Frame\Library\Log;
use Models\Name;

/**
 * Creator: xie
 * Time: 2017/11/23 17:46
 */

class IndexController extends Controller
{


    public function index(){
        echo "hello wrold";exit;
        $file = new File();
        echo $file->get('../../123.php');
//        File::get("./././index.php");
//        $model = new Name();
        $this->assign(array('contain' => '进入了'));
        $this->show();
    }

    public function second(){
        $this->show();
        echo 'second';
    }
}