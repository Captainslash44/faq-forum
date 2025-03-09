<?php

include ("../../models/User.php");


$fullname = $_GET["fullname"];
$email = $_GET["email"];
$password = $_GET["password"];

// User::setUser($fullname, $email, $password);
echo(json_encode(User::loadUserName(9)));


?>