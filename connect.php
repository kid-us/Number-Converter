<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "NumberConverter";

$coon = mysqli_connect($server, $user, $password, $db);//creating a connection
if(!$coon){
    echo "Unable to connect to the database";
}

?>