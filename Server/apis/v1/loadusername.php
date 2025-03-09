<?php

require("../../models/User.php");


if (isset($_POST["user_id"])){
    $user_id = $_POST["user_id"];

}

echo json_encode(User::loadUserName($user_id));





?>