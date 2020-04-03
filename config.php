<?php
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();



if($_ENV['ENVIRONMENT'] == 'development') {

    $client = new MongoDB\Client('mongodb://127.0.0.1:27017');

}
elseif ($_ENV['ENVIRONMENT'] == 'production') {

        $client = new MongoDB\Client(
            'mongodb+srv://dbUser:quarantine0987654321@quarantinedays-58jud.mongodb.net/quarantine_days?retryWrites=true&w=majority'
        );

}


$db = $client->quarantine_days;

$dare_collection = $db->dare_game;
$dare_users_collection = $db->dare_users;