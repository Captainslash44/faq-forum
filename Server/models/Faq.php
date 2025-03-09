<?php

require("FaqSkeleton.php");
require("../../connection/connection.php");


class Faq extends FaqSkeleton{

    public static function saveFaq(){
        global $conn;

        $query = $conn->prepare("INSERT INTO faqs (question, answer) VALUES (?,?)");
        $query->bind_param("ss", self::$question, self::$answer);
        $query->execute();

        return "faq added";
    }


    public static function getAllFaqs(){
        global $conn;

        $query = $conn->prepare("SELECT * FROM faqs");
        $query->execute();

        $response = $query->get_result();
        $answer = [];
        while($i = $response->fetch_assoc()){
            $answer[] = $i;
        }

        return $answer;
    }


};

?>