<?php

require 'vendor/autoload.php';


$client = new MongoDB\Client('mongodb://127.0.0.1:27017');

$db = $client->quarantine_days;

$dare_collection = $db->dare_game;

$dare_users_collection = $db->dare_users;