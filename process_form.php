<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8');

    // Validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo 'Invalid Email';
        exit;
    }

    // Set the recipient email address
    $to = 'eltonmorden029@gmail.com'; // Replace with the owner's email address
    $subject = 'New Contact Form Submission';
    $message = "Name: $name\nEmail: $email\nPhone: $phone";
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo 'Thank you for contacting us!';
    } else {
        echo 'Sorry, there was an error sending your message. Please try again later.';
    }
}
