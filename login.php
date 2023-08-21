<?php
require 'connect.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title>Login</title>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center">
        <div class="background">
            <div class="content">
                <div class="row">
                    <div class="col-md-5 login-form">
                        <form class="row" action="login.php" method="POST" novalidate>
                            <div class="col-md-12 mb-4">
                                <label for="inputEmail4" class="form-label">Username</label>
                                <input type="text" class="form-control" id="inputUserName" name='username' style="width: 500%; max-width: 400px;">
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="inputPassword4" class="form-label">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" name='password' style="width: 500%; max-width: 400px;">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM form WHERE username = '$username' AND password = '$password'";
    $_SESSION['sql'] = $sql;
    $conn = connect();
    session_start();
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['id'] = $row['id'];
        header("Location: mailsending.php");
    } else {
        $_SESSION['login_error_message'] = "Invalid username or password";
        header("Location: login.php");
    }
}
?>