<?php
include ("../backend/base.php");
include ("../backend/connect.php");
include ("../backend/LabHeader.php");
?>

<head>
    <link rel="icon" href="../src/Site-Logo.png">
    <link rel="stylesheet" href="../base.css">
</head>

<head>
    <title>New Password</title>
</head>

<?php

if (isset($_GET['token'])) {
    // STORE TOKEN IN COOKIE TO RETRIEVE IT IN reset.php
    setcookie('token', $_GET['token'], time() + 3600, '/');

    include ("NEWPASSdoc.html");
} else {
    header("location: /0xhashimRESETriddle/index.php");
}
?>

<?php
include ("../htdocs/labfooter.html");
?>