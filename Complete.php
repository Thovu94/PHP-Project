<?php
include 'Lab4Common/Header.php';
include 'Lab4Common/Footer.php';
session_start();
$emailComplete = $_SESSION["email"];
$nameComplete = $_SESSION["name"];
?>

<html>
    <head>
        <title></title>
    </head>
    <body>
        <div class="container">
        <div class="container-fluid">
            <?php 
            if (!isset($_SESSION["amount"]) || !isset($_SESSION["rate"]) || !isset($_SESSION["year"])){
               echo '<h2>Thank you for using our deposit calculation tool.</h2>';
   
            }
            else{
                echo'<h2>Thank you, <strong class="text-primary">'. $nameComplete . '</strong>, for using our deposit calculation tool.</h2><br>';
                echo 'An email about the detail of our GIC has been sent to <strong class="text-primary">' . $emailComplete . '</strong>';
                
            }
            ?>
            
        </div>
        </div>
    </body>
</html>