<?php
/*  


 * Student Info: Name=Uma Nagarjuna Reddy, ID=16819

 * Subject: CS526A_Homework6_Spring_2016

 * Author: umanagarjuna 

 * Filename: page.php 

 * Date and Time: Apr 8, 2016 12:36:55 AM 

 * Project Name: UmaNagarjunaReddy_16819_CS526A_HW6 


 */ 
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $pageData->title; ?></title>
        <meta http-equiv='Content-Type' content='text/html;charset=utf-8'/>
        <?php echo $pageData->css; ?>
        <?php echo $pageData->embeddedStyle ?>
    </head>
    <body>
        <?php echo $pageData->navigation; ?>
        <?php include_once "$pageData->content"; ?>
        <?php echo $pageData->scriptElements; ?>
    </body>
</html>