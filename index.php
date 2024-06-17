<?php
include ("backend/base.php");
include ("backend/connect.php");
session_start();
include ("backend/LabHeader.php");
?>

<head>
    <title>0xhashimRESETriddle: Crack the Code Conundrums</title>
</head>

<section class="main-container">
    <h1>Welcome to 0xhashim<span>RESET</span>riddle</h1>

    <?php
    if (isset($_SESSION['username'])) {
        echo "<img loading='lazy' src='src/Dex.jpg' id='batman'>
            <h1>You're <span>logged in</span>!</h1>
            <p>
    - A lab is solved when you successfully reset the
    <code>victim</code> password.
  </p>
            </section>";
    } else {
        echo "<img loading='lazy' src='src/index.gif' id='batman'>
        <h1>Go to <a href='/0xhashimRESETriddle/p/homepage.php'><span>LABS</span></a>!</h1>
        <p>
    - A lab is solved when you successfully reset the
    <code>victim</code> password.
  </p>
        </section>";
    }
    ?>


    <?php
    include ("htdocs/labfooter.html");
    ?>