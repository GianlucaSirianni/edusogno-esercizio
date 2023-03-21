<?php
include("config.php");

if(!isset($_GET["code"])){
    exit("Can't find page");
}

$code = $_GET["code"];

$getEmailQuery = mysqli_query($conn, "SELECT email FROM reset_password WHERE token='$code'");

if(mysqli_num_rows($getEmailQuery) == 0){
    exit("Can't find page");
}

if(isset($_POST["password"])){
    $pw = $_POST["password"];
    $pw = password_hash($pw, PASSWORD_DEFAULT);

    $row = mysqli_fetch_array($getEmailQuery);
    $email = $row["email"];
    $query = mysqli_query($conn, "UPDATE utenti SET password='$pw' WHERE email='$email'");

    if($query){
        $query = mysqli_query($conn, "DELETE FROM reset_password WHERE token='$code'");
        exit("Password update");
    }else{
        exit("Something went wrong");
    }
}
?>

<form method="POST">
    <input type="password" name="password" placeholder="New Password">
    <br>
    <input type="submit" name="submit" value="UpdatePassword">
</form>