<?php
include 'config.php';
$msg = "";

use SendGrid\Mail\Mail;
use SendGrid\Client;

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm-password']);
    $verification_code = md5(rand());

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
        $msg = "<div style='color: red;'>{$email} - This email address has already been registered.</div>";
    } else {
        if ($password === $confirm_password) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
            $sql = "INSERT INTO users (username, email, password, code) VALUES ('{$username}', '{$email}', '{$hashed_password}', '{$verification_code}')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                // Send the verification email
                $email = new Mail();
                $email->setFrom('tabiamorshed@gmail.com', 'Tabia Morshed');
                $email->setSubject('Email Verification');
                $email->addTo($email);
                $email->addContent(
                    'text/html',
                    "<p>Your verification code: {$verification_code}</p>"
                );

                $sendgrid = new \SendGrid('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');

                try {
                    $response = $sendgrid->send($email);

                    if ($response->statusCode() === 202) {
                        $msg = "<div class='alert alert-info'>We've sent a verification code to your email.</div>";
                    } else {
                        $msg = "<div class='alert alert-danger'>Failed to send verification email.</div>";
                    }
                } catch (Exception $e) {
                    $msg = "<div class='alert alert-danger'>Something went wrong while sending the verification email.</div>";
                }
            } else {
                $msg = "<div class='alert alert-danger'>Something went wrong while registering user.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>
    <div class="background">
        <div class="form-container">
            <h2>Sign Up</h2>
            <?php echo $msg; ?>
            <form method="post">
                <input type="text" id="username" name="username" placeholder="Username" value="<?php if (isset($_POST['submit'])) {
                                                                                                    echo $username;
                                                                                                } ?>" pattern="[A-Za-z]+" title="Only alphabets are allowed" required />

                <input type="email" id="email" name="email" placeholder="Email" value="<?php if (isset($_POST['submit'])) {
                                                                                            echo $email;
                                                                                        } ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address" required />

                <input type="password" id="password" name="password" placeholder="Password" pattern="^(?=.*[A-Za-z])(?=.*\d).{7,}$" title="Password must contain at least one alphabet, one digit, and be at least 8 characters long" required />

                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" pattern="^(?=.*[A-Za-z])(?=.*\d).{7,}$" title="Password must match the previous password" required />

                <button type="submit" name="submit">Sign Up</button>
            </form>
            <p class="signin-link">Already have an account? <a href="index.php">Sign in</a></p>
        </div>
    </div>
</body>

</html>