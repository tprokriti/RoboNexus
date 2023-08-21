<?php
require 'connect.php';

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
                        <form class="row" action="signup.php" method="POST" novalidate>
                            <div class="col-md-12 mb-4">
                                <label for="inputEmail4" class="form-label">Username</label>
                                <span style="color: red">
                                    <?php
                                    if (isset($_SESSION['username_error_message']) and !empty($_SESSION['username_error_message'])) {
                                        echo $_SESSION['username_error_message'];
                                    }
                                    ?>
                                </span>
                                <input type="text" class="form-control" id="inputUserName" name='username'>
                            </div>
                            <div class=" col-md-12 mb-4">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" name="email" style="width: 500%; max-width: 400px;" required pattern="[a-zA-Z0-9._%+-]+@gmail\.com$" title="Email should be a valid Gmail address">
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="inputPassword4" class="form-label">Password</label>
                                <input type="password" class="form-control" id="inputPassword4" name="password" style="width: 500%; max-width: 400px;" required pattern="(?=.*\d)(?=.*[a-zA-Z]).{6,}" title="Password should have at least 6 characters and include both letters and numbers">
                            </div>

                    </div>

                    <div class="col-12 input-group">
                        <button type="submit" class="btn btn-primary" name="register">Sign Up</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="js/bootstrap.js"></script>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conn = connect();
    $insert_query = "INSERT INTO form (username,email,password) values('$username','$email','$password')";
    mysqli_query($conn, $insert_query);
    session_start();
    $_SESSION['insert_query'] = $insert_query;
    header("Location: login.php");
}
?>