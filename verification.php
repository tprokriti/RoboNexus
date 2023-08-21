<?php
include 'config.php';

$msg = '';

if (isset($_GET['email']) && isset($_GET['code'])) {
    $email = mysqli_real_escape_string($conn, $_GET['email']);
    $code = mysqli_real_escape_string($conn, $_GET['code']);

    $verification_query = "SELECT * FROM verification WHERE email=? AND code=?";
    $verification_stmt = mysqli_prepare($conn, $verification_query);
    mysqli_stmt_bind_param($verification_stmt, 'ss', $email, $code);
    mysqli_stmt_execute($verification_stmt);

    $verification_result = mysqli_stmt_get_result($verification_stmt);

    if (mysqli_num_rows($verification_result) == 1) {
        $update_query = "UPDATE users SET verified=1 WHERE email=?";
        $update_stmt = mysqli_prepare($conn, $update_query);
        mysqli_stmt_bind_param($update_stmt, 's', $email);
        $update_result = mysqli_stmt_execute($update_stmt);

        if ($update_result) {
            $delete_query = "DELETE FROM verification WHERE email=?";
            $delete_stmt = mysqli_prepare($conn, $delete_query);
            mysqli_stmt_bind_param($delete_stmt, 's', $email);
            mysqli_stmt_execute($delete_stmt);

            $msg = "<p>Thank you! Your email has been successfully verified. You can now <a href='index.php'>log in</a>.</p>";
        } else {
            $msg = "<p>Oops! Something went wrong while verifying your email. Please try again later.</p>";
        }
    } else {
        $msg = "<p>Invalid verification link. Please make sure you clicked the correct link or request a new verification email.</p>";
    }
} else {
    $msg = "<p>Invalid verification link. Please make sure you clicked the correct link or request a new verification email.</p>";
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
            <?php echo $msg; ?>
        </div>
    </div>
</body>

</html>