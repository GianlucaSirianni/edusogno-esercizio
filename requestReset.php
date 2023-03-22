<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
require './config.php';

if (isset($_POST["email"])) {

    $emailTo = $_POST["email"];

    // check if email exists in database
    $check_query = mysqli_query($conn, "SELECT * FROM utenti WHERE email='$emailTo'");
    if(mysqli_num_rows($check_query) == 0){
        
        echo '<script type="text/javascript">';
        echo ' alert("Email non valida, torna indietro e riprova")'; 
        echo '</script>';
        echo '<p><a href="login.html">Torna al <strong>Login</strong> </a></p>';
        exit('');
    }

    $code = uniqid(true);

    $query = mysqli_query($conn, "INSERT INTO reset_password(token, email) VALUES ('$code', '$emailTo')");
    if(!$query){
        exit("Error");
    }

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP(); // Send using SMTP
        $mail->Host = 'smtp.libero.it'; // Set the SMTP server to send through
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'gianluca.sirianni7@libero.it'; // SMTP username
        $mail->Password = 'Pegghy.Peg96'; // SMTP password
        $mail->SMTPSecure = 'ssl'; // Enable SSL encryption
        $mail->Port = 465; // TCP port to connect to

        //Recipients
        $mail->setFrom('gianluca.sirianni7@libero.it', 'Resetter');
        $mail->addAddress($emailTo); //Add a recipient
        $mail->addReplyTo('no-reply@libero.it', 'No Reply');

        //Content
        $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "./passwordReset.php?code=$code";
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'Your password reset link';
        $mail->Body = "<h1>Click <a href='$url'>this link</a> for the reset</h1>This is the HTML message body <b>in bold!</b>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Reset password link has been sent to your email';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    exit();
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
            <h1>Vuoi resettare la tua password?</h1>
        </div>
        <div class="register-form">
            <div class="form-container">  
                <form method="POST">
                    <div class="input-field">
                        <label for="email">Inserisci l'email:</label>
                        <input type="email" name="email" id="email" placeholder="name@example.com" required>
                    </div>
                    <div class="submit-btn">
                        <input id="btn" type="submit" value="Inviami il link">
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
