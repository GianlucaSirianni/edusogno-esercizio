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
        echo '<p>La tua password è stata aggiornata, <a href="login.html">Torna al <strong>Login</strong> </a></p>';
        exit();
    }else{
        exit("Something went wrong");
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edusogno</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous' referrerpolicy='no-referrer'>
    <link rel="stylesheet" href="./assets/styles/style.css">
</head>

<body>

    <header class="nav">
        <div class="logo">
            <a href="/edusogno-esercizio">
                <img src="./assets/img/logo-edusogno.PNG" alt="">
            </a>
        </div>
    </header>

    <main>
        <div class="create">
            <h1>Cambia la tua password</h1>
        </div>
        <div class="register-form">
            <div class="form-container">  
                <form method="POST">
                    <div class="input-field">
                        <label for="password">Inserisci la nuova password:</label>
                        <div class="relative">
                            <input type="password" name="password" id="password"  placeholder="Scrivila qui" required>
                            <i class="fa-solid fa-eye fa-eye-slash" id="togglePassword"></i>
                        </div>
                    </div>
                    <div class="submit-btn">
                        <input id="btn" type="submit" value="Resetta Password">
                    </div>
                    <div class="text-center">
                        <p class="small"><a href="login.html">Torna al <strong>Login</strong> </a></p>
                    </div>
                </form>
            </div> 
        </div>
    </main>


    <script type="text/javascript" src="./assets/js/script.js"></script>
</body>

</html>
