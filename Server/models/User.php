<?php

include("UserSkeleton.php");
include("../../connection/connection.php");

class User extends UserSkeleton{

    public static function getUser(){
        global $conn;

        $query = $conn->prepare("SELECT id FROM users where email = ?");
        $query->bind_param("s", self::$email);
        $query->execute();

        $response = $query->get_result();
        if ($response == NULL){
            return ["id" => -1];
        }else{
            return ["id" => $response->fetch_assoc()["id"]];
        };
        
    }

    public static function saveUser(){
        global $conn;
        $query = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (?,?,?)");
        $hash = password_hash(self::$password, PASSWORD_BCRYPT);
        $query->bind_param("sss", self::$fullname, self::$email, $hash);
        $query->execute();

        return "user created";

    }

    public static function deleteUser(){
        global $conn;
        $query = $conn->prepare("DELETE from users where id = ?");
        if (self::getUser()["id"] == -1){

            return "user does not exist";

        } else {
            $user_id = self::getUser()["id"];
            $query->bind_param("i", $user_id);
            $query->execute();
            return "user deleted";}
        
    }

    public static function verifyPassword($password){
        global $conn;
        $query = $conn->prepare("SELECT password from users where id = ?");
        $user_id = self::getUser()["id"];
        $query->bind_param("i", $user_id);
        $query->execute();

        $response = $query->get_result();
        $answer = $response->fetch_assoc()["password"];
        
        return password_verify($password, $answer)? true : false;
    }


};

?>