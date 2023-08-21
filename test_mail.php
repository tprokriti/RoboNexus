<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';
require 'vendor/autoload.php';

require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$apiKey = $_ENV['SENDGRID_API_KEY'];


use SendGrid\Mail\Mail;

$email = new Mail();

$email->setFrom("tabiamorshed@gmail.com", "Example User");
$email->setSubject("Your account is verified");
$email->addTo("ponkidagreat@gmail.com", "Example User");
$email->addContent("text/plain", "Congratulations, your account is now verified!");
$email->addContent(
    "text/html",
    "<strong>Congratulations, your account is now verified!</strong>"
);

$pdfPath = 'C:\xampp\htdocs\RoboNexus\hello.pdf'; // Update this path
// Update this path


$fileContent = file_get_contents($pdfPath);
$base64FileContent = base64_encode($fileContent);

$attachment = new \SendGrid\Mail\Attachment();
$attachment->setContent($base64FileContent);
$attachment->setType('application/pdf'); // Set the correct MIME type for PDF
$attachment->setFilename('hello.pdf'); // Name for the attachment

$email->addAttachment($attachment);

$sendgrid = new \SendGrid($apiKey);
$headers = [];
$curlOptions = [
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_CAINFO => 'C:/xampp/htdocs/RoboNexus/certificates/cacert.pem', // Use absolute path
];


$sendgrid = new \SendGrid($apiKey);

$sendgrid->client->setCurlOptions($curlOptions); // Set cURL options for the client

try {
    $response = $sendgrid->send($email);
    printf("Response status: %d\n\n", $response->statusCode());

    $headers = array_filter($response->headers());
    echo "Response Headers\n\n";
    foreach ($headers as $header) {
        echo '- ' . $header . "\n";
    }
    echo "\nResponse Body\n";
    echo $response->body() . "\n";
    header('Location: login.php');
    exit();
} catch (Exception $e) {
    echo 'Caught exception: ' . $e->getMessage() . "\n";
}
