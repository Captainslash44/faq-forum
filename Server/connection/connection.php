<?php

$host = "localhost";
$user = "root";
$password = "";
$db_name = "faqforumdb";

$conn = new mysqli($host, $user, $password, $db_name);

if ($conn->connection_error()){
    http_response_code(400);
    echo "connection error :(";
}



?>