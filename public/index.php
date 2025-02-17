<?php
require __DIR__ . '/../src/ZodiacSign.php';



$request = strtok($_SERVER['REQUEST_URI'], '?');

if ($request === '/') {
    include __DIR__ . '/../templates/index.html';
    exit;
}

$response = [];



switch ($request) {
    case '/api/current-sign':
        $response = ZodiacSign::getCurrentSign();
        break;
    case '/api/sign-by-date':
        $date = $_GET['date'] ?? null;
        $response = ZodiacSign::getSignByDate($date);
        break;
    case '/api/dates-by-sign':
        $sign = $_GET['sign'] ?? null;
        $response = ZodiacSign::getDatesBySign($sign);
        break;
    default:
        http_response_code(404);
        $response = ['error' => 'Not found'];
        break;
}

header('Content-Type: application/json');
echo json_encode($response);
