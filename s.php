<?php
require 'config.php';

$dare_id = $_GET['id'];

try {
    $dare_user = $dare_users_collection->findOne(array('dare_id' => $dare_id));

    $dare_from = $dare_user['dare_from'];
    $dare_to = $dare_user['dare_to'];
    $dare_id_set_to = (int)$dare_user['dare_id_set_to'];
} catch (\Throwable $th) {
    throw $th;
}

try {
    $dare = $dare_collection->findOne(array('dare_id' => $dare_id_set_to));

    $dare_given = $dare['dare'];
} catch (\Throwable $th) {
    throw $th;
}


if(!isset($_COOKIE['user_id'])){
    $user_id = 0;
}
else{
    $user_id = $_COOKIE['user_id'];
}

if($user_id != $dare_user['dare_from_user_id']){
    $update_dare = array(
        "dare_id" => $dare_user['dare_id'],
        "dare_from_user_id" => $dare_user['dare_from_user_id'],
        "dare_from" => $dare_user['dare_from'],
        "dare_to" => $dare_user['dare_to'],
        "type_of_relation" => $dare_user['type_of_relation'],
        "type_of_dare" => $dare_user['type_of_dare'],
        "selected_dare" => $dare_user['selected_dare'],
        "dare_id_set_to" => $dare_user['dare_id_set_to'],
        "dare_set" => 1,
        "dare_seen" => 1
    );

    $dare_users_collection->updateOne(array("dare_from_user_id" => $dare_user['dare_from_user_id']), array('$set' => $update_dare));   
}
 
?>
<h2><?php echo $dare_from; ?>'s dare</h2>

Hey <?php echo $dare_to ?>, here is a you dare <br>
<h3><?php echo $dare_given; ?></h3>
<br>
<a href="/">Create you own dare</a>