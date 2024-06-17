<?php
include ("../backend/base.php");
include ("../backend/connect.php");
session_start();
include ("../backend/LabHeader.php");
?>

<head>
    <title>All labs</title>
    <link rel="stylesheet" href="/0xhashimRESETriddle/base.css">
    <link rel="icon" href="../src/Site-Logo.png">
</head>

<section class="main-container">
    <?php
    echo '<h1>Please, Chosoe a <span>lab</span> to solve</h1>
        <div class="challenges">
            <a href="/0xhashimRESETriddle/0xgateway/" class="challenge">
                <img loading="lazy" src="../src/lab1.png" />
                <p>0xhashimGateway</p>
            </a>
            <a href="/0xhashimRESETriddle/0xciphered/" class="challenge">
                <img loading="lazy" src="../src/lab2.jpg" />
                <p>0xcipheredCrossings</p>
            </a>
            <a href="/0xhashimRESETriddle/0xlockdown" class="challenge">
                <img loading="lazy" src="../src/lab3.jpg" />
                <p>0xlockdownLabyrinth</p>
            </a>
            <a href="/0xhashimRESETriddle/0xcryptic" class="challenge">
                <img loading="lazy" src="../src/lab4.jpg" />
                <p>0xcrypticCitadel</p>
            </a>
        </div>';
    ?>

</section>


<?php
include ("../htdocs/labfooter.html");
?>