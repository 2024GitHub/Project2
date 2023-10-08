<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

if (isset ($_POST['emailLab'])){
    $emailL=$_POST['emailL'];
    $lab=$_POST['lab'];
    $lendaL=$_POST['lendaL'];
    $subject = "Laboratori ".$lab." ne lenden ".$lendaL." nuk eshte pranuar!!";
$body = "<b>Kujdes!!Laboratoret jane kusht per hyrjen ne provim!!";
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'shkolla@gmail.com';                     // SMTP username
        $mail->Password   = 'shkolla12';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('shkolla@gmail.com', 'Test');
        $mail->addAddress($emailL);     // Add a recipient          
        $mail->addReplyTo('shkolla@gmail.com', 'Information');
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject; 
        $mail->Body    = $body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
        echo "<a href='../detyratPedagogut/lab_Dk.php'>Kthehu</a>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    


}

if (isset ($_POST['emailDK'])){
    session_start();
    $emailL=$_POST['emailL'];
    $lendaL=$_SESSION['lendaSt'];
    $subject = "Detyra Kursit ne lenden ".$lendaL." nuk eshte pranuar!!";
$body = "<b>Ju nuk mund te jeni pjese e provimit ne kete sezon!!</b>";
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'shkolla@gmail.com';                     // SMTP username
        $mail->Password   = 'shkolla12';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('shkolla@gmail.com', 'Test');
        $mail->addAddress($emailL);     // Add a recipient          
        $mail->addReplyTo('shkolla@gmail.com', 'Information');
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject; 
        $mail->Body    = $body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
        echo "<a href='../detyratPedagogut/lab_Dk.php'>Kthehu</a>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    


}






if (isset($_POST['emailStudentit'])){
    $emailM=$_POST['emailM'];
$mungesa=$_POST['mungesa'];
$lendaM=$_POST['lendaM'];
$subject = "Rrezik mungesash ne lenden".$lendaM." !!";
$body = "<i>Kujdes!! Keni plotesuar limtin e mungesave ne lenden".$lendaM." . Ju keni ".$mungesa." mungesa . 
Nese beni edhe 1(mungese) nuk plotesoni frekuentimin e lendes ,si rrjedhoje nuk mund te hyni ne provim!!</i>";

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'shkolla@gmail.com';                     // SMTP username
    $mail->Password   = 'shkolla1';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('shkolla@gmail.com', 'Test');
    $mail->addAddress($emailM);     // Add a recipient          
    $mail->addReplyTo('shkolla@gmail.com', 'Information');

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject; 
    $mail->Body    = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
    echo "<a href='shfaqListSt.php'>Kthehu</a>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}


