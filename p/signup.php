<?php
include ("../backend/base.php");
include ('../backend/LabHeader.php');
?>

<head>
    <title>Sign up</title>
    <link rel="stylesheet" href="/0xhashimRESETriddle/base.css">
    <link rel="icon" href="../src/Site-Logo.png">
</head>

<section class="main-container">
    <h1>Join us now!</h1>
    <form method="post" class="mailForm" id="loginForm" action="confirm.php">
        <input type="text" name="userName" id="userName" placeholder="username" required />
        <input type="email" name="userMail" id="userMail" placeholder="email address" required />
        <input type="password" name="userPass" id="userPass" placeholder="Password" required />
        <input type="submit" value="Sign up" id="sendFormBtn" name="signupform" />
    </form>
</section>

<?php
include ('../htdocs/labfooter.html');
?>