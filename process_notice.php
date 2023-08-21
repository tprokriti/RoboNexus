<?php
require 'connect.php';
require __DIR__ . '/vendor/autoload.php'; // Adjust the path as needed

$apiKey = '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'; // Get your SendGrid API key from environment variables

use SendGrid\Mail\Mail;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post_notice'])) {
    $subject = $_POST['subject'];
    $notice = $_POST['notice'];

    $email = new Mail();
    $email->setFrom('tabiamorshed@gmail.com', 'Tabia'); // Set your email and name
    $email->setSubject($subject);
    $email->addTo('ponkidagreat@gmail.com', 'Ponki'); // Set recipient email and name
    $email->addContent('text/html', $notice);

    $sendgrid = new SendGrid($apiKey);
    try {
        $response = $sendgrid->send($email);
        echo "Email sent successfully!";
    } catch (Exception $e) {
        echo "Email sending failed.";
    }
}
