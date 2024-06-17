<?php
session_destroy();
setcookie('PHPSESSID', '', time() - 3600, '/');
setcookie('username', '', time() - 3600, '/');
header("location: /0xhashimRESETriddle/index.php");
?>

<head>
    <title>Log out</title>
</head>