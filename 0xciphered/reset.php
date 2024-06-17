<head>
    <title>RESET</title>
</head>

<?php
include ("../backend/connect.php");
// CHANGING THE PASSWORD AND STORE IT IN THE DATABASE
if (isset($_POST['RESET']) && isset($_POST['userNewPass'])) {
    $userNewPass = $_POST['userNewPass'];
    $usr_id = base64_decode(substr(substr($_COOKIE['uid'], 6), 0, strlen(substr($_COOKIE['uid'], 6)) - 1));

    // CHECKING FOR USER ID AND CHANGING THE PASSWORD
    $id_query = "SELECT * FROM users WHERE id='$usr_id'";
    if ($conn->query($id_query) == true) {

        $insertQuery = "UPDATE users SET userpass='$userNewPass' WHERE id='$usr_id'";
        if ($conn->query($insertQuery) == true) {
            // DELETE TOKEN AFTER RESET
            $insertQuery = "UPDATE users SET reset_token=NULL WHERE id='$usr_id'";
            $conn->query($insertQuery);
            setcookie('uid', '', time() - 3600, '/');

            // RETRIEVE USERNAME
            $checkusrname = "SELECT username FROM users WHERE id='$usr_id'";
            $resultusrname = $conn->query($checkusrname);
            $row = $resultusrname->fetch_assoc();
            $usr_name = $row['username'];

            echo '<script>sessionStorage.setItem("ciphered_status","solved");</script>';
            echo "<script>alert('Password of [$usr_name] recovered successfully!')</script>";
            echo '<script>this.window.location.href="/0xhashimRESETriddle/0xciphered/index.php"</script>';
        }

    } else {
        echo '<script>alert("Invalid user id.")</script>';
        echo '<script>this.window.location.href="/0xhashimRESETriddle/0xciphered/"</script>';
    }

} else {
    echo '<script>alert("Invalid/Missing DATA.")</script>';
    echo '<script>this.window.location.href="/0xhashimRESETriddle/0xciphered/"</script>';
}