<?php

require("../../models/User.php");

if(isset($_POST["email"])){
    $email = $_POST["email"];
}

if(isset($_POST["fullname"])){
    $fullname = $_POST["fullname"];
}

if(isset($_POST["password"])){
    $password = $_POST["password"];
}

UserSkeleton::setUser($fullname, $email, $password);
if(User::getUser()["id"] == -1){
    User::saveUser();
    $response = ["response" => true];
}else {
    $response = ["response" => false];
}

echo json_encode($response);


?>