<?php

require_once('config.php');

$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $sql_select = "SELECT * FROM utenti WHERE email = '$email'";
    if($result = $conn->query($sql_select)){
        if($result-> num_rows == 1){
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if(password_verify($password, $row['password'])){
                session_start();
                $_SESSION['is_logged'] = true;
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['cognome'] = $row['cognome'];
                $_SESSION['email'] = $row['email'];

                header("location: eventi.php");
            } else {
                echo "la password non e' corretta";
            }
        } else {
            echo "non ci sono account con quello username";
        }
    } else {
        echo "errore in fase di login";
    }

    $conn->close();
}


?>