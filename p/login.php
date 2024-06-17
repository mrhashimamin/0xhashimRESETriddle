<?php
include ("../backend/base.php");
include ('../backend/LabHeader.php');
?>

<head>
    <title>Log in</title>
    <link rel="stylesheet" href="/0xhashimRESETriddle/base.css">
    <link rel="icon" href="../src/Site-Logo.png">
</head>

<section class="main-container">
    <h1>Please, Log in</h1>
    <form method="post" class="mailForm" id="loginForm" action="confirm.php">
        <input type="text" name="userName" id="userName" placeholder="Username" required />
        <input type="password" name="userPass" id="userPass" placeholder="Password" required />
        <input type="submit" value="Log in" id="sendFormBtn" name="signinform" />
    </form>
</section>

<?php
include ('../htdocs/labfooter.html');
?>