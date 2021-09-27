<?php

use PHPMailer\PHPMailer\PHPMailer;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require '../vendor/autoload.php';

$value = "";

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'index.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();
//Create a new Logger instance
$log = new Logger('mailsend');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $naam = $_POST['naam'];
    $email = $_POST['email'];
    $klacht = $_POST['klacht'];
    $file = $_POST['file'];
    try {

        // create a log channel
        $log->pushHandler(new StreamHandler('mail.log', Logger::INFO));
        // add records to the log
        $log->info("$email");
        $log->info("$naam");
        $log->info("$klacht");
    } catch (Exception $e) {
        $value = "error";
    }
    try {
//        $mail->SMTPDebug = \PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Port = 2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
//        $mail->Username = 'f16a61e57ba851';
//        $mail->Password = 'ca5a9c2f353cb1';
        $mail->setFrom('seanvbeurden@gmail.com', 'Sean van Beurden');
        $mail->addReplyTo('seanvanbeurden@hotmail.com', 'Sean van Beurden');
        $mail->addAddress($email, $naam);
        $mail->Subject = 'Uw klacht is in behandeling';
        $mail->Body = $klacht;
        if (!$mail->send()) {
            $value = 'Mailer Error: ' . $mail->ErrorInfo;
        }
    } catch (\PHPMailer\PHPMailer\Exception $e) {
        $value = $e->errorMessage();
    }

}
if($value == ""){
    $value = 'Message sent';
}
$time = time()+60*60*24*30;
setcookie("Feedback", $value, $time);
header("Location: http://$host$uri/$extra");
