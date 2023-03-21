<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
require './config.php';

if (isset($_POST["email"])) {

    $emailTo = $_POST["email"];

    $code = uniqid(true);

    $query = mysqli_query($conn, "INSERT INTO reset_password(token, email) VALUES ('$code', '$emailTo')");
    if(!$query){
        exit("Error");
    }
    //Create an instance; passing `true` enables exceptions
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
<form method="POST">
    <input type="text" name="email" placeholder="email" autocomplete="off">
    <br>
    <input type="submit" name="submit" value="Reset email">
</form>