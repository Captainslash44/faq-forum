<?php

class FaqSkeleton{

    public static $question;
    public static $answer;

    public static function setFaq($question, $answer){

        self::$question = $question;
        self::$answer = $answer;

    }
};

?>