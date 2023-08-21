<!DOCTYPE html>
<html>

<head>
  <title>Post Notice - Robotics Club</title>
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>
  <section class="header">
    <nav>
      <a href="index.html"><img src="images/logo.png" /></a>
      <div class="nav-links">
        <ul>
          <li><a href="index.php">Welcome</a></li>
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
      <div class="content-container">
        <section id="home" class="welcome-section">
          <h1 class="typing-text">
            Welcome to the Notice Section
          </h1>
        </section>
      </div>
    </main>
  </section>

  <main>
    <div class="notice-section">
      <div class="background-image"></div>
      <div class="notice-section">
        <div class="content-container">
          <section>
            <h1 class="larger-heading">Post Notice</h1>
            <form action="notice.php" method="POST">
              <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" class="larger-input" required>
              </div>
              <div class="form-group">
                <label for="notice">Notice</label>
                <input type="text" id="notice" name="notice" class="larger-textarea" required>
              </div>
              <button type="submit" name="post_notice" class="larger-button">Submit</button>
            </form>
          </section>
        </div>
      </div>
  </main>

  <footer id="footer">
    <div class="footer-content">
      <p>The website is made by Tabia Morshed</p>
      <img src="images/author.jpg" alt="Author Image" width="20" height="20" />
    </div>
  </footer>
</body>

</html>