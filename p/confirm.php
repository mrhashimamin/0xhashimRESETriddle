<?php
include '../backend/connect.php';
include '../backend/base.php';
include '../backend/LabHeader.php';
?>

<head>
    <title>0xhashimRESETriddle: Crack the Code Conundrums</title>
    <link rel="stylesheet" href="/0xhashimRESETriddle/base.css">
    <link rel="icon" href="../src/Site-Logo.png">
</head>

<section class="main-container">
    <h1>Try to <a href="login.php">Log in</a> or <a href="signup.php">Sign up</a> a new account.</h1>
    <h1>Or you can go to <a href="homepage.php">LABS</a></h1>
</section>

<?php
// SIGN UP
if (isset($_POST['signupform'])) {
    $usrName = $_POST['userName'];
    $usrMail = $_POST['userMail'];
    $usrPass = $_POST['userPass'];

    $checkMail = "SELECT * FROM users WHERE usermail='$usrMail'";
    $checkUser = "SELECT * FROM users WHERE username='$usrName'";
    $resultM = $conn->query($checkMail);
    $resultU = $conn->query($checkUser);
    if ($resultM->num_rows > 0 || $resultU->num_rows > 0) {
        echo "<script>alert('Those credentials are already exist!')</script>";
    } else {
        $insertQuery = "INSERT INTO users(username, usermail, userpass) VALUES ('$usrName','$usrMail','$usrPass')";
        if ($conn->query($insertQuery) == TRUE) {
            echo "<script>alert('You have signed up successfully!')</script>";
        } else {
            echo "Error: " . $conn->connect_error;
        }
    }
}

// LOGIN
if (isset($_POST['signinform'])) {
    $usrName = $_POST['userName'];
    $usrPass = $_POST['userPass'];

    $checkQuery = "SELECT * FROM users WHERE username='$usrName' AND userpass='$usrPass'";
    $result = $conn->query($checkQuery);
    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        header("location: /0xhashimRESETriddle/index.php");
        exit();
    } else {
        echo "<script>alert('Not Found, Incorrect Username or Password!')</script>";
    }
}
?>

<?php
include '../htdocs/labfooter.html';
?>