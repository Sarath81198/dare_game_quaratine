<?php
require_once 'config.php';

$dare = array(
    "dare_id" => 100,
    "dare_number" => 10,
    "type_of_dare" => 0,
    "dare" => "Dare 10"
);

$dare_collection->insertOne($dare);