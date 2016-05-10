
<?php
/*  


 * Student Info: Name=Uma Nagarjuna Reddy, ID=16819

 * Subject: CS526A_Homework6_Spring_2016

 * Author: umanagarjuna 

 * Filename: login.php 

 * Date and Time: Apr 26, 2016 12:36:55 AM 

 * Project Name: UmaNagarjunaReddy_16819_CS526A_HW6 

 */ 
?>
<?php
require_once('util/secure_connection.php');  // require a secure connection
require_once('/util/is_administrator_http.php');  // require a valid admin user

$loginSubmitted = isset($_POST['login_submitted']);
if ($loginSubmitted) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (is_valid_admin_login($email, $password)) {
        $_SESSION['is_valid_admin'] = true;
        $action = 'list_foods';
        $content = include_once "controllers/admin/list_foods.php";
        return $content;
    } else {
        $login_message = 'Your email address / password may be invalid.';
    }
} else {
    $email = '';
    $login_message = 'You must login to view this page.';
}
return 'views/login_view.php';
