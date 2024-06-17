<?php
include '../backend/connect.php';
header('Content-Type: application/json');

$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

// PHP MAILER
use PHPMailer\PHPMailer\PHPMailer;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

// Check if json_decode failed
if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid/Missing JSON data"]);
    exit;
}

$usr_mail = $data['userMail'];

// CHECK FOR EMAIL IN DB
$checkMail = "SELECT * FROM users WHERE usermail='$usr_mail[0]'";
$resultM = $conn->query($checkMail);

if ($resultM->num_rows > 0) {

    // RESET TOKEN
    $token = bin2hex(random_bytes(16));

    // STORING TOKEN IN DB
    $insert_Query = "UPDATE users SET reset_token='$token' WHERE usermail='$usr_mail[0]'";
    $conn->query($insert_Query);

    // SMTP SERVER
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'xhashimaminlabs@gmail.com';
    $mail->Password = 'ukjy pvcx bfsu fwcb';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('xhashimaminlabs@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = "Password Recovery";
    $resetLink = "http://localhost/0xhashimRESETriddle/0xlockdown/newpass.php?token=" . $token;
    $mail->Body = "Hey, <a href='$resetLink'>Click here</a> to reset your password.";
    $mail->addAddress($usr_mail[0]);

    // Counter checks for if email sent successfully or not
    $counter = 0;
    if ($mail->send()) {
        $counter += 1;
    }

    if (isset($usr_mail[1]) && $usr_mail[1] != null) {
        $mail->addAddress($usr_mail[1]);
        $mail->send();
        $counter += 1;
    }

} else {
    http_response_code(400);
    echo json_encode(["error" => "Email not found"]);
    exit;
}