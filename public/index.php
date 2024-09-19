<?php

session_start();


require __DIR__ . '/../config/conexao.php';

require __DIR__ . '/../config/routes.php';

$route = isset($_GET['route']) ? $_GET['route'] : '';

if (array_key_exists($route, $routes)) {
    list($controllerName, $methodName) = explode('@', $routes[$route]);

   
    require_once __DIR__ . '/../app/Controllers/' . $controllerName . '.php';

    $controller = new $controllerName();
    $controller->$methodName();
} else {    
    http_response_code(404);
    include_once "../app/views/error_page.php";
}
?>