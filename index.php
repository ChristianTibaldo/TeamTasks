<?php

header('Content-Type: application/json');
require_once 'jwt.php';
require_once 'utils.php';

$method = $_SERVER['REQUEST_METHOD'];
$path   = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$parts  = explode('/', $path);

$path = str_replace(getBasePath(), '', $path);


if ($path === 'login' && $method === 'POST') {

    $input = json_decode(file_get_contents('php://input'), true);
    //echo json_encode($input);

    if ($input['username'] === 'admin' && $input['password'] === 'password') {
        echo json_encode([
            'token' => jwt_encode(['user_id' => 1, 'role' => 'admin'])
        ]);
    } else {
        http_response_code(401);
        echo json_encode(['error' => 'Credenziali errate']);
    }
    exit;
}



http_response_code(404);
echo json_encode(['error' => 'Endpoint non valido']);

//a
