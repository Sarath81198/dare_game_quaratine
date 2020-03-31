<?php
require '../config.php';

$dare_from_users = $dare_users_collection->find();
$dares = $dare_collection->find();



foreach ($dare_from_users as $dare_from_user) {
    if ($dare_from_user['dare_seen'] == 0) {
        if (!isset($_COOKIE['user_id'])) {
            $dare_to_user_id = "dare_" . rand(10000, 99999) . uniqid();
            setcookie("user_id", $dare_to_user_id);
        } else {
            $dare_to_user_id = $_COOKIE['user_id'];
        }
        if ($_COOKIE['user_id'] == $dare_from_user['dare_from_user_id'] || $_COOKIE['user_id'] == $dare_to_user_id) {
            if($dare_from_user['dare_id_set_to'] == $_GET['id']){
                    $update_dare = array(
                        "dare_id" => $dare_from_user['dare_id'],
                        "dare_from_user_id" => $dare_from_user['dare_from_user_id'],
                        "dare_to_user_id" => $dare_to_user_id,
                        "dare_from" => $dare_from_user['dare_from'],
                        "dare_to" => $dare_from_user['dare_to'],
                        "type_of_relation" => $dare_from_user['type_of_relation'],
                        "type_of_dare" => $dare_from_user['type_of_dare'],
                        "selected_dare" => $dare_from_user['selected_dare'],
                        "dare_id_set_to" => $dare_from_user['dare_id_set_to'],
                        "dare_set" => 1,
                        "dare_seen" => 1
                    );

                    $dare_users_collection->updateOne(array("dare_from_user_id" => $dare_from_user['dare_from_user_id']), array('$set' => $update_dare));

                    foreach ($dares as $dare) {
                        if ($dare['dare_id'] == $_GET['id']) {
                            $dare_given = $dare['dare'];

                            echo $dare_given;
                        }
                    }
            }

            break;
        }
    }
    else{
        if (!isset($_COOKIE['user_id'])) {
            $dare_to_user_id = "dare_" . rand(10000, 99999) . uniqid();
            setcookie("user_id", $dare_to_user_id);
        } else {
            $dare_to_user_id = $_COOKIE['user_id'];
        }
        if ($_COOKIE['user_id'] == $dare_from_user['dare_from_user_id'] || $_COOKIE['user_id'] == $dare_from_user['dare_to_user_id']) {
            if ($dare_from_user['dare_id_set_to'] == $_GET['id']) {
                foreach ($dares as $dare) {
                    if ($dare['dare_id'] == $_GET['id']) {
                        $dare_given = $dare['dare'];


                        echo $dare_given;
                    }
                }
            }
        }
    }
}