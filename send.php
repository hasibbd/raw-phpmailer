<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendMail($trx){
    $mail = new PHPMailer(true);
    try {
        //Enable SMTP debugging.
        $mail->SMTPDebug = 3;
        //Set PHPMailer to use SMTP.
        $mail->isSMTP();
        //Set SMTP host name
        $mail->Host = "server.sitli.com";
        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;
        //Provide username and password
        $mail->Username = "send@jeday.com";
        $mail->Password = "jz0gnzavLK64";
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "tls";
        //Set TCP port to connect to
        $mail->Port = 587;
        $mail->From = "btc.unconfirmed@gmail.com";
        $mail->FromName = "Quickly Accelerate";
        $mail->addAddress("hasib.0951@gmail.com", "Contact");
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'New Request';
        $mail->Body = 'This transaction ID: <b>'.$trx.'</b>'. '<br><br>' .'<b> Client IP:- </b>'.getUserIP();
        $mail->send();

    } catch (Exception $e) {

    }
}
if (isset($_POST['mail_submit'])){
    sendMail($_POST['mail_submit']);
}

?>