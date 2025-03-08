<?php

include_once("../models/User.php");
include("../connection/connection.php");

User::setUser("Halim Njeim", "michaelnjeim44@gmail.com", "CaptainSlash");
User::saveUser();





?>