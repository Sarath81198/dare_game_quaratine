<?php
require_once '../../config.php';

if (!isset($_POST['set_dare']) && $_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: /");
}

if (!isset($_POST['dare_from']) || trim($_POST['dare_from']) == '') {
    echo "You did not enter your name.";
}

if (!isset($_POST['dare_to']) || trim($_POST['dare_to']) == '') {
    echo "You did not enter the other person's name.";
}

if (!isset($_POST['type_of_relation']) || trim($_POST['type_of_relation']) == '') {
    echo "You did not enter your name.";
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$dare_from = test_input($_POST['dare_from']);
$dare_to = test_input($_POST['dare_to']);
$type_of_relation = test_input($_POST['type_of_relation']);

if (!isset($_COOKIE['user_id'])) {
    $dare_from_user_id = "dare_" . rand(10000, 99999) . uniqid();
    setcookie("user_id", $dare_from_user_id);
} else {
    $dare_from_user_id = $_COOKIE['user_id'];
}

switch ($type_of_relation) {
    case 'Crush':
        $type_of_dare = 0;
        $selected_dare = rand(1, 10);
        $dare_id = $dare_from_user_id . '_' . $type_of_dare . '_' . $selected_dare . '_' . uniqid();
        break;

    case 'Girlfriend/Boyfriend':
        $type_of_dare = 1;
        $selected_dare = rand(1, 10);
        $dare_id = $dare_from_user_id . '_' . $type_of_dare . '_' . $selected_dare . '_' . uniqid();
        break;

    case 'Guy/Girl bestfriend':
        $type_of_dare = 2;
        $selected_dare = rand(1, 10);
        $dare_id = $dare_from_user_id . '_' . $type_of_dare . '_' . $selected_dare . '_' . uniqid();
        break;

    default:
        echo 0;
        break;
}

$set_dare = array(
    "dare_id" => $dare_id,
    "dare_from_user_id" => $dare_from_user_id,
    "dare_from" => $dare_from,
    "dare_to" => $dare_to,
    "type_of_relation" => $type_of_relation,
    "type_of_dare" => $type_of_dare,
    "selected_dare" => $selected_dare,
    "dare_id_set_to" => $selected_dare . $type_of_dare,
    "dare_set" => 1,
    "dare_seen" => 0
);

if ($dare_users_collection->insertOne($set_dare)) {
    $selected_dare_id = $selected_dare . $type_of_dare;
    try {
        $dares = $dare_collection->find();
        foreach ($dares as $dare) {
            if ($selected_dare_id == $dare['dare_id']) {
                echo "Here is the dare link: <br> http://localhost:8000/dare?id=" . $dare['dare_id'];
            }
        }
    } catch (\Throwable $th) {
        throw $th;
    }
} else {
    echo 0;
}
