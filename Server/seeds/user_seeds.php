<?php

require __DIR__. "../connection/connection.php";

$fullname = "Halim Njeim";
$email = "michaelnjeim44@gmail.com";
$password = password_hash("Halim123", PASSWORD_BCRYPT);

$query = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (?,?,?)");
$query->bind_param("sss", $fullname, $email, $password);
$query->execute();




?>