<head>
    <title>RESET</title>
</head>

<?php
include ("../backend/connect.php");
// CHANGING THE PASSWORD AND STORE IT IN THE DATABASE
if (isset($_POST['RESET']) && isset($_POST['userNewPass'])) {
    $userNewPass = $_POST['userNewPass'];
    $token = $_COOKIE['token'];
    $insertQuery = "UPDATE users SET userpass='$userNewPass' WHERE reset_token='$token'";
    $TOKEN_CONN = $conn->query($insertQuery);

    // SELECTING USER ID
    $id_query = "SELECT id FROM users WHERE reset_token='$token'";
    $result = $conn->query($id_query);
    $row = $result->fetch_assoc();
    $user_id = $row['id'];

    // CHECK IF reset_token != NULL or not ( VALID OR NOT )
    $DB_TOKEN_SELECT_QUERY = "SELECT reset_token FROM users WHERE id='$user_id'";
    $token_result = $conn->query($DB_TOKEN_SELECT_QUERY);
    $row = $token_result->fetch_assoc();
    $DB_TOKEN = $row['reset_token'];
    if ($TOKEN_CONN == TRUE && $DB_TOKEN != NULL) {
        echo '<script>sessionStorage.setItem("lockdown_status","solved");</script>';
        echo '<script>alert("Password recovered successfully!")</script>';
        echo '<script>this.window.location.href="/0xhashimRESETriddle/0xlockdown/index.php"</script>';
    } else {
        echo '<script>alert("This token is not valid anymore.")</script>';
        echo '<script>this.window.location.href="/0xhashimRESETriddle/0xlockdown/"</script>';
    }


    // DELETE TOKEN AFTER RESET
    $insertQuery = "UPDATE users SET reset_token=NULL WHERE id='$user_id'";
    $conn->query($insertQuery);
    setcookie('token', '', time() - 3600, '/');
} else {
    echo '<script>alert("Invalid/Missing DATA.")</script>';
    echo '<script>this.window.location.href="/0xhashimRESETriddle/0xgatway/"</script>';
}