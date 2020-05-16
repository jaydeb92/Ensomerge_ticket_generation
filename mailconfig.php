<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$mail = new PHPMailer;



// SMTP configuration
$mail->isSMTP();
//$mail->SMTPDebug = 2;
$mail->Host     = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'mmmm';
$mail->Password = 'mmmmmm';
$mail->SMTPSecure = 'tls';
$mail->Port     = 587; 
 ?>