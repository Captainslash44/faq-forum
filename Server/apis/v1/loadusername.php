<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");
require("../../models/User.php");


if (isset($_POST["user_id"])){
    $user_id = $_POST["user_id"];

}

echo json_encode(User::loadUserName($user_id));





?>