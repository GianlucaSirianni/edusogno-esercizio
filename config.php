<?php

$host = "localhost:8889";
$user = "root";
$password = "root";
$db = "edusogno-db";

$conn = mysqli_connect($host, $user, $password, $db);

if(!$conn){
    die("Connessione fallita: " . mysqli_connect_error());
}

?>