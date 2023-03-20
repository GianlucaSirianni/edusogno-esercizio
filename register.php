<?php

require_once('config.php');

$first_name = $conn->real_escape_string($_POST['firstname']);
$last_name = $conn->real_escape_string($_POST['lastname']);
$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$sql = "INSERT INTO utenti (nome, cognome, email, password) VALUES ('$first_name', '$last_name', '$email', '$hashed_password')";

if($conn->query($sql) === true){
    echo "Your Registration was successful";
}else{
    echo "A problem in occurred with your connection $sql. " . $conn->error;
}


?>