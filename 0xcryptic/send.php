<head>
    <title>SEND</title>
</head>

<?php
include '../backend/connect.php';

use PHPMailer\PHPMailer\PHPMailer;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

if (isset($_POST['resetPASS'])) {

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'xhashimaminlabs@gmail.com';
    $mail->Password = 'ukjy pvcx bfsu fwcb';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('xhashimaminlabs@gmail.com');
    $usrInpMail = $_POST['userMail'];
    $mail->addAddress($usrInpMail);
    $mail->isHTML(true);
    $checkMail = "SELECT * FROM users WHERE usermail='$usrInpMail'";
    $resultM = $conn->query($checkMail);

    if ($resultM->num_rows > 0) {

        // RESET OTP
        $OTP = rand(1000, 9999);

        $mail->Subject = "Password Recovery";

        // SEARCHING FOR USER 
        $checkusrname = "SELECT username FROM users WHERE usermail='$usrInpMail'";
        $resultusrname = $conn->query($checkusrname);
        $row = $resultusrname->fetch_assoc();
        $username = $row['username'];

        // STORING OTP IN DB
        $insert_Query = "UPDATE users SET reset_otp='$OTP' WHERE username='$username'";
        $conn->query($insert_Query);

        $mail->Body = "<center>Hey, This is your OTP to reset your password.</center><br><center style='font-size: 1.5em; font-weight: 600;'>$OTP</center>";

        $mail->send();

        echo '<script>alert("OTP sent successfully.")</script>';
        echo "<script>this.window.location.href='/0xhashimRESETriddle/0xcryptic/otp.php?u=$username'</script>";
    } else {
        echo '<script>alert("E-Mail not found.")</script>';
        echo '<script>this.window.location.href="/0xhashimRESETriddle/0xcryptic/"</script>';
    }
}