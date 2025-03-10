<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");
include("UserSkeleton.php");
include("../../connection/connection.php");

class User extends UserSkeleton{

    public static function getUser(){
        global $conn;

        $query = $conn->prepare("SELECT id FROM users where email = ?");
        $query->bind_param("s", self::$email);
        $query->execute();

        $response = $query->get_result();
        $answer = $response->fetch_assoc();
        if ($answer != NULL){
            return ["id" => $answer["id"]];
        }else{
            return ["id" => -1];
        }
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
        
        if($response != NULL){
            $answer = $response->fetch_assoc()["password"];
        }else{
            return false;
        }
        
        return password_verify($password, $answer)? true : false;
    }

    public static function loadUserName($user_id){
        global $conn;

        $query = $conn->prepare("SELECT full_name FROM users where id =?");
        $query->bind_param("i", $user_id);
        $query->execute();

        $response = $query->get_result();
        return $response->fetch_assoc()["full_name"];
    }
};

?>