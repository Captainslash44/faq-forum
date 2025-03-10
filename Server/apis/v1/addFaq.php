<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");
require("../../models/Faq.php");


if (isset($_POST["user_id"])){
if(isset($_POST["question"])){
    $question = $_POST["question"];
}

if(isset($_POST["answer"])){
    $answer = $_POST["answer"];
}

FaqSkeleton::setFaq($question, $answer);
Faq::saveFaq();
echo json_encode(["response" => 1]);

}else{
    echo json_encode(["response" => -1]);
}


?>