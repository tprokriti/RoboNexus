<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use \SendGrid\Mail\Mail;

$email = new Mail();
// Replace the email address and name with your verified sender
$email->setFrom(
    'tabiamorshed@gmail.com',
    'Example Sender'
);
$email->setSubject('Sending with Twilio SendGrid is Fun');
// Replace the email address and name with your recipient
$email->addTo(
    'ponkidagreat@gmail.com',
    'Example Recipient'
);
$email->addContent(
    'text/html',
    '<strong>and fast with the PHP helper library.</strong>'
);

$sendgrid = new \SendGrid('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');

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_CAINFO, '/cacert.pem');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

try {
    // Send the email using SendGrid
    $response = $sendgrid->send($email);

    // Output response status code
    $statusCode = $response->statusCode();
    printf("Response status: %d\n\n", $statusCode);

    // Output response headers
    $headers = array_filter($response->headers());
    echo "Response Headers\n\n";
    foreach ($headers as $header) {
        echo '- ' . $header . "\n";
    }

    // Provide user feedback based on the response
    if ($statusCode === 202) {
        echo "Email sent successfully!\n";
    } else {
        echo "Failed to send email. Please try again later.\n";
    }
} catch (Exception $e) {
    echo 'Caught exception: ' . $e->getMessage() . "\n";
    echo "Something went wrong while sending the email. Please try again later.\n";
}

// Close cURL session
curl_close($ch);
