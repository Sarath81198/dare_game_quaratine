<?php
require 'vendor/autoload.php';

try {
    $client = new MongoDB\Client(
        'mongodb+srv://admin:quarantine0987654321@quarantinedays-58jud.mongodb.net/quarantine_days?retryWrites=true&w=majority'
    );

    $db = $client->quarantine_days;
    $collection = $db->dare_game;
    print_r($collection->find());
    $a = array(
        "name" => "sara"
    );
    $collection->insertOne($a);
    echo 1;
} catch (\Throwable $th) {
    throw $th;
}
