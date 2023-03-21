<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if(isset($_POST['email'])){
    $emailTo = $_POST['email'];
        //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //Enable verbose debug output
        $mail->isSMTP(); // Send using SMTP
        $mail->Host = 'smtp.libero.it'; // Set the SMTP server to send through
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'gianluca.sirianni7@libero.it'; // SMTP username
        $mail->Password = 'Pegghy.Peg96'; // SMTP password
        $mail->SMTPSecure = 'ssl'; // Enable SSL encryption
        $mail->Port = 465; // TCP port to connect to

        //Recipients
        $mail->setFrom('gianluca.sirianni7@libero.it', 'Resetter');
        $mail->addAddress("$emailTo");     //Add a recipient
            //Name is optional
        $mail->addReplyTo('no-reply@gmail.com', 'No-reply');


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'I fight A LOT';
        $mail->Body    = 'and i mean <b>A LOT!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <div class="input-field">
            <label for="email">Inserisci la tua Mail:</label>
            <input type="email" name="email" id="email" style="width: 300px;" placeholder="Inserisci la tua email" autocomplete="off">
        </div>
        <input type="submit" name="submit" value="Reset Password">
    </form>
</body>
</html>