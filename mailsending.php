<?php

declare(strict_types=1);

require 'connect.php';
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$apiKey = $_ENV['SENDGRID_API_KEY'];

use SendGrid\Mail\Mail;

session_start();

$email = new Mail();

$email->setFrom(
    'tabiamorshed@gmail.com',
    'RoboNexus'
);

$email->setSubject('Congratulations! Your account has been created');

$email->addTo(
    $_SESSION['email'],
    $_SESSION['username']
);

$emailContent = '
    <html>
    <body>
        <p>Hi ' . $_SESSION['username'] . ',</p>
        <p>Your account has been created.</p>
    </body>
    </html>';

$email->addContent(
    'text/html',
    $emailContent
);

$email->setReplyTo("tabiamorshed@gmail.com", "Get Help");

$headers = [
    'Authorization' => 'Bearer ' . $apiKey,
    'Content-Type' => 'application/json',
];


$email->setClickTracking(true, true);
$email->setOpenTracking(true, "--sub--");
$email->setSubscriptionTracking(
    true,
    "subscribe",
    "<bold>subscribe</bold>",
    "%%sub%%"
);
$email->setGanalytics(
    true,
    "utm_source",
    "utm_medium",
    "utm_term",
    "utm_content",
    "utm_campaign"
);


$curlOptions = [
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_CAINFO => 'C:\xampp\htdocs\RoboNexus\certificates\cacert.pem',
];

$sendgrid = new \SendGrid($apiKey);

$sendgrid->client->setCurlOptions($curlOptions);

try {
    $response = $sendgrid->send($email);

    header("Location: home.php");
    exit();
} catch (Exception $e) {
    echo 'Caught exception: ' . $e->getMessage() . "\n";
}
