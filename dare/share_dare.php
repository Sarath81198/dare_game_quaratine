<?php
require_once '../config.php';

if (!isset($_POST['set_dare']) && $_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: /");
}

if (!isset($_POST['dare_from']) || trim($_POST['dare_from']) == '') {
    header("Location: /");
}

if (!isset($_POST['dare_to']) || trim($_POST['dare_to']) == '') {
    header("Location: /");
}

if (!isset($_POST['type_of_relation']) || trim($_POST['type_of_relation']) == '') {
    header("Location: /");
}

if (gettype($_POST['dare_from']) != "string") {
    header("Location: /");
}

if (gettype($_POST['dare_to']) != "string") {
    header("Location: /");
}

if (gettype($_POST['type_of_relation']) != "string") {
    header("Location: /");
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
        $dare = $dare_collection->findOne(array('dare_id' => (int) $selected_dare_id));
        if ((int) $selected_dare_id == $dare['dare_id']) {
            $dare_id_given = $dare_id;
        }
    } catch (\Throwable $th) {
        throw $th;
        echo 0;
    }
} else {
    echo 0;
}
?>
<meta property="og:title" content="Do the Dare!" />
<meta property="og:url" content="http://<?php echo $base_URL; ?>/dare/dare.php?id=<?php echo $dare_id_given ?>" />
<meta property="og:description" content="You can set your dare and send it to your special ones">

<h1>Hey <?php echo $dare_from; ?>, share this to <?php echo $dare_to; ?></h1>
http://<?php echo $base_URL; ?>/dare/dare.php?id=<?php echo $dare_id_given ?><br>
<a href="whatsapp://send?text=<?php echo $dare_to; ?>, here's the dare for you. <br><br> http://<?php echo $base_URL; ?>/dare/dare.php?id=<?php echo $dare_id_given ?>" data-action="http://<?php echo $base_URL; ?>/dare/dare.php?id=<?php echo $dare_id_given ?>">Share via Whatsapp</a>