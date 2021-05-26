<?php
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';

function Return404()
{
    $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
    header('HTTP/1.1 404 Not Found');
    header("Status: 404 Not Found");
    header('Location:' . $host . '404');
}

$title = 'main';
$actionName = 'default';

$routes = $_SERVER['REQUEST_URI'];
$routes = trim($routes, '/');
$routes = explode('/', $routes);


if (isset($routes[1]) && !empty($routes[1])) {
    $title = strtolower($routes[1]);
    if (isset($routes[2])) {
        $actionName = strtolower($routes[2]);
    }
}

$modelName = 'model_' . $title;
$controllerName = 'controller_' . $title;
$actionName = 'action_' . $actionName;

$modelFilePath = 'application/models/' . $modelName . '.php';
if (file_exists($modelFilePath)) {
    include $modelFilePath;
}

$controllerFilePath = 'application/controllers/' . $controllerName . '.php';
if (file_exists($controllerFilePath)) {
    include $controllerFilePath;
} else {
    Return404();
    return;
}

$controller = new $controllerName;
if (method_exists($controller, $actionName)) {
    $controller->$actionName();
} else {
    //здесь можно выбросить какое-нибудь исключение
    return;
}
