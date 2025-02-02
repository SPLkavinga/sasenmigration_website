<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to = "sasen.migration2005@gmail.com";
    $subject = $_POST['subject'];
    $message = "Name: " . $_POST['name'] . "\n"
             . "Email: " . $_POST['email'] . "\n"
             . "Phone: " . $_POST['phone'] . "\n"
             . "Project: " . $_POST['project'] . "\n\n"
             . $_POST['message'];
    $headers = "From: " . $_POST['email'];

    if (mail($to, $subject, $message, $headers)) {
        echo "Your message was sent successfully!";
    } else {
        echo "Sorry, something went wrong. Please try again.";
    }
} else {
    echo "Invalid request method!";
}
