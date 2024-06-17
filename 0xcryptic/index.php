<?php
include ("../backend/base.php");
include ("../backend/connect.php");
session_start();
include ('../backend/LabHeader.php');
?>

<head>
    <link rel="icon" href="../src/Site-Logo.png">
    <link rel="stylesheet" href="../base.css">
    <script src="labSOLVED.js"></script>
    <title>0xcrypticCitadel</title>
</head>

<?php
include ("../htdocs/solveSLIDE.HTML");
include ("RESETdoc.html");
?>

<?php
echo '</section>';
include ('../htdocs/labfooter.html');
?>