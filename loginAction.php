<?php
session_start();
require 'connect.php';
$username = $password = "";

$conn = connect();
$errors = 0;

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    if (empty($username)) {
        $errors++;
        $_SESSION['username_error_message'] = "Username is empty";
    }

    if (empty($password)) {
        $errors++;
        $_SESSION['password_error_message'] = "Password is empty";
    }

    if ($errors == 0) {
        $sql = "SELECT * FROM member WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            header("Location: Forum.php");
            exit;
        } else {
            $_SESSION['login_error_message'] = "Invalid username or password";
            echo "Login failed: " . mysqli_error($conn);
        }
    }
    header("Location: login.php");
    exit;
}
