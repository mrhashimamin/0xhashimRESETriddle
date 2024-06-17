<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "0xhashimRESETriddle";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo 'Failed to connect to DATABASE: ' . $conn->connect_error;
}
