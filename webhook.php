<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/index.php';

$content = file_get_contents("php://input");
$update = json_decode($content, true);

if ($update) {
    http_response_code(200);
    echo "OK";
} else {
    http_response_code(400);
    echo "Invalid request";
}
?>
