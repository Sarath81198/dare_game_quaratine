<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: /");
}

if (!isset($_POST['name']) || trim($_POST['name']) == '') {
    header("Location: /");
}

if (!isset($_POST['ques_one']) || trim($_POST['ques_one']) == '') {
    header("Location: /");
}

if (!isset($_POST['ques_two']) || trim($_POST['ques_two']) == '') {
    header("Location: /");
}

if (!isset($_POST['ques_three']) || trim($_POST['ques_three']) == '') {
    header("Location: /");
}

if (!isset($_POST['ques_four']) || trim($_POST['ques_four']) == '') {
    header("Location: /");
}
if (!isset($_POST['ques_five']) || trim($_POST['ques_five']) == '') {
    header("Location: /");
}

if (!isset($_POST['ques_six']) || trim($_POST['ques_six']) == '') {
    header("Location: /");
}

if (!isset($_POST['ques_seven']) || trim($_POST['ques_seven']) == '') {
    header("Location: /");
}



if (gettype($_POST['name']) != "string") {
    header("Location: /");
}

if (gettype($_POST['ques_one']) != "string") {
    header("Location: /");
}

if (gettype($_POST['ques_two']) != "string") {
    header("Location: /");
}

if (gettype($_POST['ques_three']) != "string") {
    header("Location: /");
}

if (gettype($_POST['ques_four']) != "string") {
    header("Location: /");
}

if (gettype($_POST['ques_five']) != "string") {
    header("Location: /");
}

if (gettype($_POST['ques_six']) != "string") {
    header("Location: /");
}

if (gettype($_POST['ques_seven']) != "string") {
    header("Location: /");
}

require_once '../config.php';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name = test_input($_POST['name']);
$ques_one = test_input($_POST['ques_one']);
$ques_two = test_input($_POST['ques_two']);
$ques_three = test_input($_POST['ques_three']);
$ques_four = test_input($_POST['ques_four']);
$ques_five = test_input($_POST['ques_five']);
$ques_six = test_input($_POST['ques_six']);
$ques_seven = test_input($_POST['ques_seven']);

$answers_array = array(
    "ques_one" => $ques_one,
    "ques_two" => $ques_two,
    "ques_three" => $ques_three,
    "ques_four" => $ques_four,
    "ques_five" => $ques_five,
    "ques_six" => $ques_six,
    "ques_seven" => $ques_seven,
);
$count = 1;
foreach ($answers_array as $answer_array) {
    switch ($count) {
        case 1:
            switch ($answer_array) {
                case 1:
                    $ques_one_score = 10;
                    break;

                case 2:
                    $ques_one_score = 0;
                    break;

                case 3:
                    $ques_one_score = 20;
                    break;

                case 4:
                    $ques_one_score = 30;
                    break;
                
                default:
                    # code...
                    break;
            }
            break;

        case 2:
            switch ($answer_array) {
                case 1:
                    $ques_two_score = 30;
                    break;

                case 2:
                    $ques_two_score = 0;
                    break;

                case 3:
                    $ques_two_score = 20;
                    break;

                case 4:
                    $ques_two_score = 10;
                    break;

                default:
                    # code...
                    break;
            }

            break;

        case 3:
            switch ($answer_array) {
                case 1:
                    $ques_three_score = 0;
                    break;

                case 2:
                    $ques_three_score = 20;
                    break;

                case 3:
                    $ques_three_score = 10;
                    break;

                case 4:
                    $ques_three_score = 30;
                    break;

                default:
                    # code...
                    break;
            }

            break;

        case 4:
            switch ($answer_array) {
                case 1:
                    $ques_four_score = 20;
                    break;

                case 2:
                    $ques_four_score = 0;
                    break;

                case 3:
                    $ques_four_score = 30;
                    break;

                case 4:
                    $ques_four_score = 10;
                    break;

                default:
                    # code...
                    break;
            }

            break;

        case 5:
            switch ($answer_array) {
                case 1:
                    $ques_five_score = 20;
                    break;

                case 2:
                    $ques_five_score = 10;
                    break;

                case 3:
                    $ques_five_score = 30;
                    break;

                case 4:
                    $ques_five_score = 0;
                    break;

                default:
                    # code...
                    break;
            }
            break;

        case 6:
            switch ($answer_array) {
                case 1:
                    $ques_six_score = 0;
                    break;

                case 2:
                    $ques_six_score = 10;
                    break;

                case 3:
                    $ques_six_score = 20;
                    break;

                case 4:
                    $ques_six_score = 30;
                    break;

                default:
                    # code...
                    break;
            }
            break;

        case 7:
            switch ($answer_array) {
                case 1:
                    $ques_seven_score = 10;
                    break;

                case 2:
                    $ques_seven_score = 20;
                    break;

                case 3:
                    $ques_seven_score = 30;
                    break;

                case 4:
                    $ques_seven_score = 0;
                    break;

                default:
                    # code...
                    break;
            }
            break;
            
        default:
            # code...
            break;
    }
    $count++;
}

$total_score =  $ques_one_score + $ques_two_score + $ques_three_score + $ques_four_score + $ques_five_score + $ques_six_score + $ques_seven_score;

if(0 <= $total_score && $total_score <= 50){
    $secret_lover = "First Crush";
    $gif_file_name = "crush.gif";
    $body_content = "A while ago you might have thought they didn't even notice you. But time has passed and now a days your first crush has noticed you!";
}
elseif (60 <= $total_score && $total_score <= 100) {
    $secret_lover = "Co-Worker";
    $gif_file_name = "co_worker.gif";
    $body_content = "Love is in the air of your workspace. How do you feel about  office romances ??";
}
elseif (110 <= $total_score && $total_score <= 150) {
    $secret_lover = "Best Friend";
    $gif_file_name = "bestfriend.gif";
    $body_content = "It turns out to be your best friend, your best friend might want you to be more than a best friend.";
}
elseif (160 <= $total_score && $total_score <= 210) {
    $secret_lover = "Neighbour";
    $gif_file_name = "neighbour.gif";
    $body_content = "Have you ever noticed your neighbour leaving a hint of love ? Go ahead and try it out. Terrace love will grow out into a terrific love !";
}

$insert_data = array(
    "secret_lover_id" => rand(10000,99999). uniqid(),
    "name" => $name,
    "secret_lover" => $secret_lover,
    "ques_one" => $ques_one,
    "ques_two" => $ques_two,
    "ques_three" => $ques_three,
    "ques_four" => $ques_four,
    "ques_five" => $ques_five,
    "ques_six" => $ques_six,
    "ques_seven" => $ques_seven,
    "total_score" => $total_score,
);

try {
    $secret_lover_collection->insertOne($insert_data);
} catch (\Throwable $th) {
    echo "Something went wrong. Please try again!";
    //throw $th;
}

require_once '../view/secret_love/result.php';