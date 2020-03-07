<?php
require "Base/init.php";

echo '<pre>';
print_r(get_included_files());
$parts = explode('/', $_SERVER['REQUEST_URI']);

$controllerName = $parts[1];
$actionName = $parts[2];

$controllerFileName = 'App\Controller\\' . ucfirst($controllerName);
var_dump($controllerFileName);
$controllerObj = new $controllerName();
//var_dump($controllerObj);

$controllerFuncName = $actionName . 'Action';

if (!method_exists($controllerObj, $controllerFuncName)) {
    echo '404';
    die;
}

$tpl = 'App/Templates/' . $controllerFileName . '/' . $actionName . '.phtml';

$view = new View();
$controllerObj->view = $view;

$controllerObj->$controllerFuncName();

$view->render($tpl);