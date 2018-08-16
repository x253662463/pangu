<?php
/**
 * Creator: xie
 * Time: 2018/8/16 16:03
 */

namespace Pangu;

use Pangu\Library\Router;
use Pangu\Library\App;
use Pangu\Library\Autoload;

define('PANGU', __DIR__ . DIRECTORY_SEPARATOR);
define('PANGU_ROOT', PANGU . '..' . DIRECTORY_SEPARATOR);
define('PANGU_LIB', PANGU . 'Library' . DIRECTORY_SEPARATOR);
define('PANGU_CONF', PANGU . 'Conf' . DIRECTORY_SEPARATOR);
define('PANGU_FUNC', PANGU . 'Functions' . DIRECTORY_SEPARATOR);

define('APP_PATH', PANGU_ROOT . 'App');



require PANGU_LIB . 'Autoload.class.php';

new Autoload();

new App(new Router());