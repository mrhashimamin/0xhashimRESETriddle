<?php
include ("../backend/connect.php");

?>

<?php

// Capture client IP Address
function getClientIP()
{
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

if (isset($_POST['OTPSubmit']) && isset($_POST['OTP']) && isset($_POST['usr_name'])) {

    // STORING USER IP IN DB && in cookies
    $usr_name = $_POST['usr_name'];
    $client_ip = getClientIP();
    // setcookie('user_ip', $client_ip, time() + 3600, '/');
    $ip_query = "UPDATE users SET user_ip='$client_ip' WHERE username='$usr_name'";
    $conn->query($ip_query);

    $OTP = $_POST['OTP'];

    // CHECKING FOR OTP IN DB
    $checkusrotp = "SELECT * FROM users WHERE reset_otp='$OTP'";
    $resultusrotp = $conn->query($checkusrotp);

    if ($resultusrotp->num_rows > 0) {

        include ("../backend/base.php");
        include ("../backend/LabHeader.php");
        echo '<head>
        <link rel="icon" href="../src/Site-Logo.png">
        <title>New Password</title>
        <link rel="stylesheet" href="../base.css">
        </head>';

        // STORE TOKEN IN COOKIE TO RETRIEVE IT IN reset.php
        setcookie('otp', $OTP, time() + 3600, '/');
        include ("NEWPASSdoc.html");

    } else {
        http_response_code(400);

        // searching for counter
        $att_query = "SELECT att_counter FROM users WHERE user_ip='$client_ip'";
        $resultcounter = $conn->query($att_query);
        $row = $resultcounter->fetch_assoc();
        $counter = $row['att_counter'];

        // counter condition
        // False three time => block ip && ip changed => reset counter
        if ($client_ip !== "127.0.0.1") {
            $counter = 0;
            $save_counter_query = "UPDATE users SET att_counter='$counter' WHERE user_ip='$client_ip'";
            $conn->query($save_counter_query);

            // Checking for OTP
            // CHECKING FOR OTP IN DB
            $checkusrotp = "SELECT * FROM users WHERE reset_otp='$OTP'";
            $resultusrotp = $conn->query($checkusrotp);

            if ($resultusrotp->num_rows > 0) {

                include ("../backend/base.php");
                include ("../backend/LabHeader.php");
                echo '<head>
                <link rel="icon" href="../src/Site-Logo.png">
                <title>New Password</title>
                <link rel="stylesheet" href="../base.css">
                </head>';

                // STORE TOKEN IN COOKIE TO RETRIEVE IT IN reset.php
                setcookie('otp', $OTP, time() + 3600, '/');
                include ("NEWPASSdoc.html");

            } else {

                // Error
                header('Content-Type: application/json');
                echo json_encode(["error" => "Incorrect OTP"]);
                exit;
            }

        } else {
            if ($counter > 2) {
                header('Content-Type: application/json');
                echo json_encode(["error" => "Blocked IP Address"]);
                exit;

            } else {
                // check for the ip in db
                $db_ip_query = "SELECT user_ip FROM users WHERE username='$usr_name'";
                $result_db_ip = $conn->query($db_ip_query);
                $row = $result_db_ip->fetch_assoc();
                $db_ip = $row['user_ip'];

                // Increase the counter and save it in DB
                $counter += 1;
                $save_counter_query = "UPDATE users SET att_counter='$counter' WHERE user_ip='$client_ip'";
                $conn->query($save_counter_query);

                // Error
                header('Content-Type: application/json');
                echo json_encode(["error" => "Incorrect OTP"]);
                exit;
            }
        }

    }


} else {
    header("location: /0xhashimRESETriddle/index.php");
}
?>

<?php
include ("../htdocs/labfooter.html");
?>