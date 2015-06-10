<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

session_start();
// STANDARD INDEX
include_once('system/libs/variables.php');
include_once('system/libs/class.dbfunctions.php');
include_once('system/libs/class.util.php');

$_SESSION['xcms']['lang'] = ($_SESSION['xcms']['lang'] == '') ? 'de' : $_SESSION['xcms']['lang'];

define('DS', '//');
define('PRJ', dirname(__FILE__));
define('VIEWS', PRJ.DS.'views');
define('SYSTEM', PRJ.DS.'system');
define('CONTROLLERS', SYSTEM.DS.'controllers');
define('LAYOUTS', SYSTEM.DS.'layouts');
define('LIB', SYSTEM.DS.'libs');
define('ELEMENTS', SYSTEM.DS.'elements');
define('MODULE', SYSTEM.DS.'module');
define('JS', LIB.DS.'js');
define('IMAGES', VIEWS.DS.'img');
define('UPLOAD', PRJ.DS.'files'.DS);

#define('VIEW', PRJ.DS.'views');

define('PATH', VIEWS.DS.'center'.DS);

define('PRJPFAD', $_SERVER['DOCUMENT_ROOT']);
define('DEFAULTCONTROLLER', 'center');
define('LAYOUT', 'jetland');
define('BASEURL', PRJ.'/index.php');
define('DEBUG', 0);
define('PREFIX', 'j11_');


require_once(LIB.DS.'template.php');
#
require_once(LIB.DS.'frontcontroller.php');
require_once(LIB.DS.'controller.php');


if(isset($_REQUEST['action'])) {
	$action = addslashes(strtolower($_REQUEST['action']));
} else {
     if (isset($action)) {
          $_REQUEST['action'] = $action;

     } else {
     	$_REQUEST['action'] = 'index';
     	$action = 'index';
     }
}


if(isset($_REQUEST['controller'])) {
	$controller = addslashes(strtolower($_REQUEST['controller']));
} else {
	$controller = DEFAULTCONTROLLER;
}

if(isset($_REQUEST['printFrom'])) {
	$printFrom = addslashes(strtolower($_REQUEST['printFrom']));
} else {
	$printFrom = '';
}

$fc = new FrontController();
$fc->setController($controller);
$fc->setAction($action);
$fc->run();
	

