<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>FAQ</title>
</head>

<body>
    <section class="header">
        <nav>
            <a href="index.html"><img src="images/logo.png" /></a>
            <div class="nav-links">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li class="has-submenu">
                        <a href="#">Competition</a>
                        <ul class="submenu">
                            <li><a href="#">Local</a></li>
                            <li><a href="#">Domestic</a></li>
                            <li><a href="#">International</a></li>
                        </ul>
                    </li>
                    <li><a href="notice.php">Notices</a></li>
                    <li><a href="#">User</a></li>
                    <li><a href="#">FAQs</a></li>
                </ul>
            </div>
        </nav>
    </section>

    <div class="background">
        <div class="page-name">
            <h1 class="typing-text">
                Frequently Asked Questions
            </h1>
        </div>
        <form class="faq-form" action="home.php" method="POST">
            <h2>Feel free to ask</h2>
            <input type="text" name="question" placeholder="Your question">
            <input type="submit" value="Submit">
        </form>
    </div>

    <footer id="footer">
        <div class="footer-content">
            <p>The website is made by Tabia Morshed</p>
            <img src="images/author.jpg" alt="Author Image" width="20" height="20" />
        </div>
    </footer>
</body>

</html>