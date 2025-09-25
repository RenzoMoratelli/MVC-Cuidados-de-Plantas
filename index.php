<?php
$request = strtok($_SERVER["REQUEST_URI"], '?');

$basePath = "/mvcPlantas";
$request = str_replace($basePath, "", $request);


if ($request === "" || $request === "/") {
    require __DIR__ . "/app/views/home.php";
    exit;
}

$parts = explode("/", trim($request, "/"));
$controllerName = ucfirst($parts[0]) . "Controller"; 
$method = $parts[1] ?? "index";                     
$id = $parts[2] ?? null;                            

$controllerFile = __DIR__ . "/app/controllers/" . $controllerName . ".php";

if (file_exists($controllerFile)) {
    require $controllerFile;
    $controller = new $controllerName();

    if (method_exists($controller, $method)) {
        $controller->$method($id);
    } else {
        http_response_code(404);
        echo "Método <b>$method</b> não encontrado no controller $controllerName!";
    }
} else {
    http_response_code(404);
    echo "Controller <b>$controllerName</b> não encontrado!";
}
