<?php
include ('../backend/base.php');
include ('../backend/connect.php');
include ('../backend/LabHeader.php');
?>

<head>
    <link rel='icon' href='../src/Site-Logo.png'>
    <link rel='stylesheet' href='../base.css'>
</head>

<head>
    <title>OTP</title>
</head>

<?php
$usr_name = $_GET['u'];
echo "<section class='main-container'>
<h1>Please enter the OTP sent to your email</h1>

<form method='post' class='mailForm' id='loginForm' action='newpass.php'>
    <input type='text' name='OTP' placeholder='4-Digit OTP' required />
    <input type='hidden' name='usr_name' value=$usr_name>
    <input type='submit' value='Submit' id='sendFormBtn' name='OTPSubmit' />
</form>

</section>";

?>

<?php
include ('../htdocs/labfooter.html');
?>