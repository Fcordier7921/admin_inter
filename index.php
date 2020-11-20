<?php
session_start();
// generate an econtance path to index 
// define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
define("DS", DIRECTORY_SEPARATOR);
define("ROOT", dirname(__FILE__));
define("ROOTVIEW", ROOT . DS . "views" . DS);

//recuperation des scripts standard
require_once('core/Model.php');
require_once('core/Controller.php');

//recuperation des parametres pour router vers le bon controller
$controller = isset($_GET['controller']) && !empty($_GET['controller']) ?  ucfirst($_GET['controller']) : 'Pages';
$action = isset($_GET['action']) && !empty($_GET['action']) ? $_GET['action'] : 'index';
$args = isset($_GET['args']) ? $_GET['args'] : [];

require_once(ROOT . DS . 'controllers' . DS . $controller . 'Controller.php');
$classe = $controller . 'Controller';
$ctrl = new $classe();

if (method_exists($ctrl, $action)) {
  $ctrl->$action($args);
} else {
  http_response_code(404);
  header('location: /404.html');
}
