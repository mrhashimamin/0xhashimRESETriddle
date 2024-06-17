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

        // RESET MESSAGE 
        $mail->Subject = "Password Recovery";

        // RESET TOKEN
        $token = bin2hex(random_bytes(16));

        // USER ID
        $checkusrid = "SELECT id FROM users WHERE usermail='$usrInpMail'";
        $resultusrid = $conn->query($checkusrid);
        $row = $resultusrid->fetch_assoc();
        $usr_id = $row['id'];

        $usr_id = "rndS@l" . base64_encode($usr_id) . "t";

        $resetLink = "http://localhost/0xhashimRESETriddle/0xciphered/newpass.php?uid=" . $usr_id . "&token=" . $token;
        $mail->Body = "Hey, <a href='$resetLink'>Click here</a> to reset your password.";

        $mail->send();

        echo '<script>alert("Reset link has been sent successfully.")</script>';
        echo '<script>this.window.location.href="/0xhashimRESETriddle/0xciphered/"</script>';
    } else {
        echo '<script>alert("Reset link can not be send.")</script>';
        echo '<script>this.window.location.href="/0xhashimRESETriddle/0xciphered/"</script>';
    }
}