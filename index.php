<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome to Robotics Club</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>
    <section class="header">
        <nav>
            <a href="index.html"><img src="images/logo.png" /></a>
            <div class="nav-links">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li class="has-submenu">
                        <a href="competition.php">Competition</a>
                        <ul class="submenu">
                            <li><a href="local.php">Local</a></li>
                            <li><a href="national.php">National</a></li>
                            <li><a href="international.php">International</a></li>
                        </ul>
                    </li>
                    <li><a href="notice.php">Notices</a></li>
                    <li><a href="faq.php">FAQs</a></li>
                </ul>
            </div>
        </nav>
        <main>

            <div class="content">
                <h2>Welcome to my project</h2>

                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="error success">
                        <h3>
                            <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                            ?>
                        </h3>
                    </div>
                <?php endif ?>

                <?php if (isset($_SESSION['username'])) : ?>
                    <p> <strong><?php echo $_SESSION['username']; ?></strong></p>
                    <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
                <?php endif ?>
            </div>

</body>

</html>