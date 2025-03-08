<?php

include ("../../models/User.php");


$fullname = $_GET["name"];
$email = $_GET["email"];
$password = $_GET["password"];

User::setUser($fullname, $email, $password);
echo(json_encode(User::deleteUser()));



?>