<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


include 'db.php'; // Database connection include karna na bhoolo

if (isset($_POST['btnsubmit'])) {
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact-number'];
    $message = $_POST['message'];

    // SQL Query to insert data
    $query = "INSERT INTO form (First_Name, Last_Name, Email, Contact_Number, Message) VALUES ('$first_name', '$last_name', '$email', '$contact_number', '$message')";

    $result = mysqli_query($conn, $query);
    if($result){
        header("Location: index.html"); 
    }

    if ($result) {

        // Email Send Setup
        $mail = new PHPMailer(true);

        try {
            // SMTP Settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'form.submission4@gmail.com';
            $mail->Password = 'kjlx mcmj kxnr jkyy'; // App Password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Email Settings
            $mail->setFrom('form.submission4@gmail.com', 'Portfolio Form');
            $mail->addAddress('mohammadomarf37@gmail.com'); // Apni email par send karega

            $mail->Subject = "New Form Submission";
            $mail->Body = "
                New Form has been submitted: 
                First Name: $first_name
                Last Name: $last_name
                Email: $email
                Contact Number: $contact_number
                Message: $message
            ";

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


    }

    // Connection close kar do
    mysqli_close($conn);
}
?>
