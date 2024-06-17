<?php
include ("connect.php");
?>

<section class="lab-header">
  <a href="/0xhashimRESETriddle/" class="site-logo">
    <div class="site-logo-div">
      <h1>0xhashim<span>RESET</span>riddle</h1>
    </div>
  </a>

  <div class="site-links">

    <?php
    if (isset($_SESSION['username'])) {
      echo '<a href="https://medium.com/@hashimamin/list/0xhashimaminlabs-16604083fd24" target="_blank" class="link-button" id="logout-button">Solutions</a>';
      echo "<a href='/0xhashimRESETriddle/p/homepage.php' class='link-button' id='logout-button'>";
      echo $_SESSION['username'];
      echo '</a>';
      echo '<a href="/0xhashimRESETriddle/p/logout.php" class="link-button" id="logout-button">Log out</a>';
    } else {
      echo '<a href="https://medium.com/@hashimamin/list/0xhashimaminlabs-16604083fd24" target="_blank" class="link-button" id="logout-button">Solutions</a>';
      echo '<a href="/0xhashimRESETriddle/p/login.php" class="link-button" id="login-button">Log in</a>
    <a href="/0xhashimRESETriddle/p/signup.php" class="link-button" id="signup-button">Sign up</a>';
    }
    ?>

  </div>
</section>