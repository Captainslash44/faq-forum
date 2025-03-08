<?php

  class UserSkeleton{

    public static $fullname;
    public static $email;
    public static $password;

    public static function setUser($fullname, $email, $password){
        self::$fullname = $fullname;
        self::$email = $email;
        self::$password = $password;
    }
    
}


?>