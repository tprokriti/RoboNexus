<!DOCTYPE html>
<html>

<head>
  <title>Notices</title>
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
      <div class="content-container">
        <section id="home" class="welcome-section">
          <h1>Club's Notices</h1>
          <p>
            This page contains all the notices that have been posted by the
            club. You can search for notices by entering the subject of the
            notice in the search bar.
          </p>
        </section>
        <section id="notices">
          <h2>Notices</h2>
          <input type="text" id="search" placeholder="Search for notices..." />
          <ul id="notice-list">
            <?php foreach ($notices as $notice) { ?>
              <li>
                <a href="#"><?php echo $notice; ?></a>
              </li>
            <?php } ?>
          </ul>
        </section>
        <section id="post-notice">
          <h2>Post a notice</h2>
          <form action="post_notice.php" method="POST">
            <input type="text" name="subject" placeholder="Subject" />
            <textarea name="notice" placeholder="Notice"></textarea>
            <input type="submit" value="Post" />
          </form>
        </section>
      </div>
    </main>
  </section>

  <footer id="footer">
    <div class="footer-content">
      <p>The website is made by Tabia Morshed</p>
      <img src="images/author.jpg" alt="Author Image" width="20" height="20" />
    </div>
  </footer>
</body>

</html>