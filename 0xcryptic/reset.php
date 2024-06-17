<head>
    <title>RESET</title>
</head>

<?php
include ("../backend/connect.php");
// CHANGING THE PASSWORD AND STORE IT IN THE DATABASE
if (isset($_POST['RESET']) && isset($_POST['userNewPass'])) {
    $userNewPass = $_POST['userNewPass'];
    $OTP = $_COOKIE['otp'];
    $insertQuery = "UPDATE users SET userpass='$userNewPass' WHERE reset_otp='$OTP'";
    $TOKEN_CONN = $conn->query($insertQuery);

    // SELECTING USER ID
    $id_query = "SELECT id FROM users WHERE reset_otp='$OTP'";
    $result = $conn->query($id_query);
    $row = $result->fetch_assoc();
    $user_id = $row['id'];

    // CHECK IF reset_otp != NULL or not ( VALID OR NOT )
    $DB_OTP_SELECT_QUERY = "SELECT reset_otp FROM users WHERE id='$user_id'";
    $otp_result = $conn->query($DB_OTP_SELECT_QUERY);
    $row = $otp_result->fetch_assoc();
    $DB_OTP = $row['reset_otp'];

    if ($TOKEN_CONN == TRUE && $DB_OTP != NULL) {
        echo '<script>sessionStorage.setItem("cryptic_status","solved");</script>';
        echo '<script>alert("Password recovered successfully!")</script>';
        echo '<script>this.window.location.href="/0xhashimRESETriddle/0xcryptic/index.php"</script>';
    } else {
        echo '<script>alert("This otp is not valid anymore.")</script>';
        echo '<script>this.window.location.href="/0xhashimRESETriddle/0xcryptic/"</script>';
    }


    // DELETE TOKEN AFTER RESET
    $insertQuery = "UPDATE users SET reset_otp=NULL WHERE id='$user_id'";
    $conn->query($insertQuery);
    $insertQuery = "UPDATE users SET user_ip=NULL WHERE id='$user_id'";
    $conn->query($insertQuery);
    setcookie('otp', '', time() - 3600, '/');

} else {
    echo '<script>alert("Invalid/Missing DATA.")</script>';
    echo '<script>this.window.location.href="/0xhashimRESETriddle/0xgatway/"</script>';
}