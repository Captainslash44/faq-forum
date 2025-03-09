<?php

require("../../models/User.php");

if(isset($_POST["password"])){
    $password = $_POST["password"];
}
if(isset($_POST["email"])){
    $email = $_POST["email"];
}

UserSkeleton::setUser("placeholder", $email, $password);

if(User::verifyPassword($password)){
    echo json_encode(User::getUser());
}else{
    echo json_encode(["id" => -1]);
}



?>