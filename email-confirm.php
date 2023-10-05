<!-- install phpmailer -->

<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

    session_start();
    $email = $_SESSION["email"];
    
    $mail = new PHPMailer;
    
    $mail->isSMTP();
    $mail->SMTPDebug = false;
    $mail->Debugoutput = 'html';
    $mail->Host = 'localhost';
    $mail->Port = 25;
    $mail->SMTPAutoTLS = false;
    $mail->SMTPAuth = false;
    
    $mail->Username = 'test@river.fr';
    $mail->Password = 'Admin';
    $mail->setFrom('test@river.fr', 'Christophe');
    $mail->addAddress($email);
    $mail->Subject = 'Verification du mail';
    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
    $mail->msgHTML('<h3>Bienvenue sur River Ride !</h3><br><p>Votre code de verification est : <b style="font-size: 30px;">' . $verification_code . '</b></p>');
    $mail->AltBody = '';
    
        if($mail->send()){
            echo 'Message has been sent';
            echo $email;
            echo $password;
            echo $verification_code;
            echo $name;
        }else{
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    
    $_SESSION['verification'] = $verification_code;
    header('location: email-check.php');
    exit();

?>