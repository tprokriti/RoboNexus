<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


require 'connect.php';

use SendGrid\Mail\Mail; // Include the use statement here

$errors = 0;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Your test_input function and form validation here

    if ($errors == 0) {
        // Successfully validated, now register the user
        if (registerUser($username, $email, $password)) {
            $_SESSION['registration_successful'] = "Registration successful";

            // Send verification email using SendGrid
            require __DIR__ . '/vendor/autoload.php';

            $email = new Mail();
            $email->setFrom('tabiamorshed@gmail.com', 'RoboNexus');
            $email->setSubject('Account Verification');
            $email->addTo($email, $username);
            $email->addContent('text/html', $emailContent);

            $sendgrid = new SendGrid('YOUR_SENDGRID_API_KEY');
            try {
                $response = $sendgrid->send($email);
            } catch (Exception $e) {
                echo 'Caught exception: ' . $e->getMessage() . "\n";
            }
        } else {
            echo "User registration failed.";
        }
    }

    header("Location: signup.php");
    exit;
}
