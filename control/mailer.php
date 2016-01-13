<!-- ******************************
    PHPMailer cronJob
    *********************************-->
<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
require '../PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "alexvotry@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "whidbeyisland";
//Set who the message is to be sent from
$mail->setFrom('alex@votry.com', 'First Last');
//Set an alternative reply-to address
$mail->addReplyTo('alex@votry.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('sienna@votry.com', 'John Doe');
//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>
<?php 
// **************************************************************

// error_reporting(E_STRICT | E_ALL);
// date_default_timezone_set('Etc/UTC');
// require '../PHPMailerAutoload.php';
// require_once('../control/include/dbConstants.php');
// $mail = new PHPMailer;
// $body = file_get_contents('medForm.php');
// // ********************* I put this in dbConstants
// $mail->isSMTP();
// $mail->Host = 'smtp.example.com';
// $mail->SMTPAuth = true;
// // $mail->SMTPKeepAlive = true; // SMTP connection will not close after each email sent, reduces SMTP overhead
// $mail->Port = 25;
// $mail->Username = 'yourname@example.com';
// $mail->Password = 'yourpassword';
// $mail->setFrom('list@example.com', 'List manager');
// $mail->addReplyTo('list@example.com', 'List manager');
// $mail->Subject = "PHPMailer Simple database mailing list test";
// //Same body for all messages, so set this before the sending loop
// //If you generate a different body for each recipient (e.g. you're using a templating system),
// //set it inside the loop
// $mail->msgHTML($body);
// //msgHTML also sets AltBody, but if you want a custom one, set it afterwards
// $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
// //Connect to the database and select the recipients from your mailing list that have not yet been sent to
// //You'll need to alter this to match your database

// // *********************** if I want to create a database with email addresses:
// $mysql = mysqli_connect('localhost', 'username', 'password');
// mysqli_select_db($db, 'mydb');
// $result = mysqli_query($mysql, 'SELECT full_name, email, photo FROM mailinglist WHERE sent = false');
// foreach ($result as $row) { //This iterator syntax only works in PHP 5.4+
//     $mail->addAddress($row['email'], $row['full_name']);
//     if (!empty($row['photo'])) {
//         $mail->addStringAttachment($row['photo'], 'YourPhoto.jpg'); //Assumes the image data is stored in the DB
//     }
//     if (!$mail->send()) {
//         echo "Mailer Error (" . str_replace("@", "&#64;", $row["email"]) . ') ' . $mail->ErrorInfo . '<br />';
//         break; //Abandon sending
//     } else {
//         echo "Message sent to :" . $row['full_name'] . ' (' . str_replace("@", "&#64;", $row['email']) . ')<br />';
//         //Mark it as sent in the DB
//         mysqli_query(
//             $mysql,
//             "UPDATE mailinglist SET sent = true WHERE email = '" .
//             mysqli_real_escape_string($mysql, $row['email']) . "'"
//         );
//     }

//    // Clear all addresses and attachments for next loop
//     $mail->clearAddresses();
//     $mail->clearAttachments();
// }
?>