<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;


$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

$apiKey = $_ENV['SENDGRID_API_KEY'];


use SendGrid\Mail\Mail;

$email = new Mail();

// Replace the email address and name with your verified sender
$email->setFrom(
    'tabiamorshed@gmail.com',
    'Tabia'
);

$email->setSubject('Testing');

// Replace the email address and name with your recipient
$email->addTo(
    'ponkidagreat@gmail.com',
    'ponki'
);

$email->addContent(
    'text/html',
    '<p>Hello, this is a customized email message.</p>'
);

// Customize the attachment
$attachmentPath = __DIR__ . '/hello.pdf'; // Update the attachment path
if (file_exists($attachmentPath)) {
    $file_encoded = base64_encode(file_get_contents($attachmentPath));
    $email->addAttachment(
        $file_encoded,
        "application/pdf",
        "hello.pdf",
        "attachment"
    );
} else {
    echo "Attachment file not found at: $attachmentPath\n";
}

// Set a custom reply-to address
$email->setReplyTo("tabiamorshed@gmail.com", "Reply To Name");

$headers = [
    'Authorization' => 'Bearer ' . $apiKey,
    'Content-Type' => 'application/json',
];

$email->setFooter(true, "Custom Footer", "<br><strong>This is the custom footer text.</strong>");

// Customize tracking settings
$email->setClickTracking(true, true);
$email->setOpenTracking(true, "Click to open");
$email->setSubscriptionTracking(
    true,
    "subscribe",
    "<strong>Click here to subscribe</strong>",
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

// Initialize cURL options with the path to the CA certificate bundle
$curlOptions = [
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_CAINFO => __DIR__ . '/certificates/cacert.pem', // Update the path
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
} catch (Exception $e) {
    echo 'Caught exception: ' . $e->getMessage() . "\n";
}
