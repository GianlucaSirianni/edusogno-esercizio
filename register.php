<?php

require_once('config.php');

$first_name = $conn->real_escape_string($_POST['firstname']);
$last_name = $conn->real_escape_string($_POST['lastname']);
$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$sql = "INSERT INTO utenti (nome, cognome, email, password) VALUES ('$first_name', '$last_name', '$email', '$hashed_password')";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if($conn->query($sql) === true){
        ?>
        <div>
            <h1>Ti sei registrato con successo!</h1>
            <div class="text-center">
                <p class="small"><a href="login.html">Vai al <strong>Login</strong> </a></p>
            </div>
        </div> 
        <?php
    }else{
        echo "A problem in occurred with your connection $sql. " . $conn->error;
    }


    ?>
</body>
</html>

