<?php

session_start();
if(!isset($_SESSION['is_logged']) || $_SESSION['is_logged'] !== true){
    header("location: login.html");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventi</title>
</head>
<body>
    <h1>Area Privata</h1>
    <?php
        echo "Ciao " . $_SESSION['nome'];

    ?>

    <a href="logout.php">Logout</a>

    <?php


    ?>
</body>
</html>