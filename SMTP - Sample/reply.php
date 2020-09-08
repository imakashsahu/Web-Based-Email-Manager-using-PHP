<!-- 
    Please Use this Link to grant access from GMAIL to sent mail
    https://myaccount.google.com/lesssecureapps?pli=1     !! IF account doesn't has 2 Step Verification
    https://support.google.com/mail/answer/185833?hl=en-GB  !! For 2 Step Verification accounts follow steps
 -->

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";

$mail               = new PHPMailer;                                // create a new instance
$mail->isSMTP();                                                    // set that we're using stmp
$mail->CharSet      = 'UTF-8';                                      // make sure it's utf-8 encoded
$mail->Host         = 'smtp.gmail.com';                             // the hostname of the mail server
$mail->Port         = 587;                                          // set the smtp port number (587 for authenticated TLS)
$mail->SMTPSecure   = 'tls';                                        // set the encryption to use, ssl (deprecated) or tls
$mail->SMTPAuth     = true;                                         // should we use smtp authentication?
$mail->Username     = 'your-email-address@gmail.com';                               // the user name for the smtp authentication
$mail->Password     = 'your_password';                            // the password for smtp authentication
$mail->wordWrap     = 70;                                           // make sure we've no lines longer than 70 chars
// $mail->Subject      = "[Payment] Player {$payment->user->name} ({$payment->user->id}) - Payment ID {$payment->id}";
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'Test 2';
$mail->setFrom( 'your-email-address@gmail.com' );                         // who this is from
$mail->addReplyTo( 'your-email-address@gmail.com' );                      // who we can reply to
$mail->ReplyTo( 'your-email-address@gmail.com' ); // so we get threading on gmail (needed as to and from are the same address)
$mail->isHTML( true );                                              // is this a html formatted email?
if(!$mail->Send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    exit;
 }
 
 echo 'Message has been sent';