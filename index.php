<?php
include 'config.php';

$msg = '';

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $verification_code = mysqli_real_escape_string($conn, $_POST['verification_code']);

    $query = "SELECT * FROM users WHERE email='{$email}' AND code='{$verification_code}'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Verification successful, allow user to log in
        $user = mysqli_fetch_assoc($result);
        $hashed_password = $user['password'];

        if (password_verify($_POST['password'], $hashed_password)) {
            $msg = "<div class='alert alert-success'>Login successful.</div>";
        } else {
            $msg = "<div class='alert alert-danger'>Invalid password.</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>Invalid email or verification code.</div>";
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
            <h2>Login</h2>
            <?php echo $msg; ?>
            <form method="post">
                <input type="email" id="email" name="email" placeholder="Email" required />
                <input type="text" id="verification_code" name="verification_code" placeholder="Verification Code" required />
                <input type="password" id="password" name="password" placeholder="Password" required />
                <button type="submit" name="login">Log In</button>
            </form>
            <p class="signin-link">Don't have an account? <a href="signup.php">Sign up</a></p>
        </div>
    </div>
</body>

</html>