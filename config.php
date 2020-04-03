<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die(header('location: /'));
}

require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


if($_ENV['ENVIRONMENT'] == 'development') {

    $client = new MongoDB\Client('mongodb://127.0.0.1:27017');
    $base_URL = "localhost:8000";

}
elseif ($_ENV['ENVIRONMENT'] == 'production') {

        $client = new MongoDB\Client(
            $_ENV['MONGODB_URI']
        );
        $base_URL = $_SERVER['SERVER_NAME'];
}


$db = $client->quarantine_days;

$dare_collection = $db->dare_game;
$dare_users_collection = $db->dare_users;