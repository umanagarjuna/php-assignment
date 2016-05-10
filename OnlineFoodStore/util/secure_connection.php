<?php
/*  


 * Student Info: Name=Uma Nagarjuna Reddy, ID=16819

 * Subject: CS526A_Homework6_Spring_2016

 * Author: umanagarjuna 

 * Filename: secure_connection.php 

 * Date and Time: Apr 8, 2016 12:36:55 AM 

 * Project Name: UmaNagarjunaReddy_16819_CS526A_HW6 

 */ 
    // make sure the page uses a secure connection
    if (!isset($_SERVER['HTTPS'])) {
         if ($_SERVER['HTTP_HOST'] == 'localhost') {
            $localhost = 'localhost';
        }
        $url = 'https://' . $localhost . $_SERVER['REQUEST_URI'];
        header("Location: " . $url);
        exit();
    }
?>
