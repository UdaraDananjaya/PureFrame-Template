<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function mailsender( $Mail_Subject,$Mail_Txt,$MAIL_TO ){
$phpmailer = new PHPMailer();
$phpmailer->isSMTP();
$phpmailer->Host = CONFIG['smtp_host'];
$phpmailer->SMTPAuth = true;
$phpmailer->Port = CONFIG['smtp_port'];
$phpmailer->Username = CONFIG['smtp_username'];
$phpmailer->Password = CONFIG['smtp_password'];
$phpmailer->setFrom( CONFIG['smtp_email'], CONFIG['smtp_name']);
$phpmailer->addAddress($MAIL_TO, 'Joe User');
$phpmailer->isHTML(true);
$phpmailer->Subject = $Mail_Subject;
$phpmailer->Body    = $Mail_Txt;

  $phpmailer->send();
	
}

?>