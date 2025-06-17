<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    $project_type = htmlspecialchars(trim($_POST['project_type'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    if (!$name || !$email || !$message) {
        echo '<p style="color:red;">Please fill in all required fields with a valid email.</p>';
        exit;
    }

    $to = 'kidussirak72@gmail.com'; // CHANGE THIS TO YOUR EMAIL
    $subject = 'New Contact Form Submission from ' . $name;
    $body = "Name: $name\nEmail: $email\nProject Type: $project_type\nMessage:\n$message";
    $headers = "From: $email\r\nReply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo '<p style="color:green;">Thank you for contacting me! I will get back to you soon.</p>';
    } else {
        echo '<p style="color:red;">Sorry, there was an error sending your message. Please try again later.</p>';
    }
} else {
    echo '<p style="color:red;">Invalid request.</p>';
}
?> 