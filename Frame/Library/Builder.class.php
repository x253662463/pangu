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

    protected $appName;

    public function __construct($appName){

        $this->appName = ucfirst(strtolower($appName));

        $this->appPath = ROOT_PATH . $this->appName . DIRECTORY_SEPARATOR;

        if (!is_dir($this->appPath)){
            $this->generateApp();
        }
    }

    public function generateApp(){
        $appDirs = array(
            $this->appPath . '/Controllers/',
            $this->appPath . '/Models/',
            $this->appPath . '/Conf/',
            $this->appPath . '/Views/',
        );

        $this->generateDirs($appDirs);

        $this->generateController('index');
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

    public function generateController($controller){
        $controller = ucfirst(strtolower($controller));
        $file = $this->appPath . 'Controllers' . DIRECTORY_SEPARATOR . $controller . '.class.php';
        $template = "<?php\nnamespace " . $this->appName . "\\Controllers;\nuse Frame\Library\Controller;\n
class " . $controller . " extends Controller{\n}
        ";
        if (!is_file($file)){
            file_put_contents($file,$template);
            echo "chenggong ";
        }
    }

    public function generateModel($model){

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