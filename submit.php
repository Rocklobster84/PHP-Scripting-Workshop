<?php
  // Import PHPMailer classes into the global namespace
  // These must be at the top of your script, not inside a function
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    //Tell PHPMailer to use SMTP
    $mail->isSMTP();

    //Create Variables to hold form data
    $first_name = filter_var($_POST['first-name'], FILTER_SANITIZE_STRING);
    $last_name = filter_var($_POST['last-name'], FILTER_SANITIZE_STRING);
    $emailaddress = filter_var($_POST['emailaddress'], FILTER_VALIDATE_EMAIL);
    $comments = filter_var($_POST['comments'], FILTER_SANITIZE_STRING);
    //If the bot catcher has been filled out, kill the process
    if(!empty($_POST['email'])) die();

    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';  

    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;
    //Set the encryption mechanism to use - STARTTLS or SMTPS
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = "scriptingclass4@gmail.com";
    //Password to use for SMTP authentication
    $mail->Password = "LetsLearn1234";
    //Set who the message is to be sent from
    $mail->setFrom('scriptingclass4@gmail.com', 'Scripting Class');
    //Set who the message is to be sent to
    $mail->addAddress('scriptingclass4@gmail.com');

    //Sets the subject line
    $mail->Subject =  "Contact Request from "  . $first_name . " " . $last_name ."\r\n";

    //Sets styling for the message body
    $mail->Body = '<html><head><style> body {font-family: Verdana, sans-serif; font-size:10pt;} h2 {color:#005dab; font-size:14pt;} h3 {color:#005dab; font-size:12pt;} p {margin: 0em;}</style></head><body>';

    //Message Body
    $mail->Body .= "<h3>Contact Information</h3>" . "\r\n";

    $mail->Body .= "<p><strong>Name:</strong>&nbsp; " . " " . $first_name . " " . $last_name . "</p>\r\n";

    $mail->Body .= "<p><strong>Email:</strong>&nbsp; " . $emailaddress . "</p>\r\n";

    $mail->Body .= "<h3>Comments</h3>" . "\r\n";

    $mail->Body .= "<p>" . $comments . "</p>\r\n";

    $mail->Body .= "</body></html>";

    //Tells PHPMailer that message is HTML
    $mail->IsHTML(true);

    //Send users to a confirmation page after submission
    header( "Location: confirmation.html" );

    //send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
?>