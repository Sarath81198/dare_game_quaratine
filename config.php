<?php
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();



if($_ENV['ENVIRONMENT'] == 'development') {

    $client = new MongoDB\Client('mongodb://127.0.0.1:27017');

}
elseif ($_ENV['ENVIRONMENT'] == 'production') {

        $client = new MongoDB\Client(
            $_ENV['MONGODB_URI']
        );

}


$db = $client->quarantine_days;

$dare_collection = $db->dare_game;
$dare_users_collection = $db->dare_users;