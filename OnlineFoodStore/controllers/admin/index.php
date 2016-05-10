<?php
/*  


 * Student Info: Name=Uma Nagarjuna Reddy, ID=16819

 * Subject: CS526A_Homework6_Spring_2016

 * Author: umanagarjuna 

 * Filename: index.php 

 * Date and Time: Apr 26, 2016 12:36:55 AM 

 * Project Name: UmaNagarjunaReddy_16819_CS526A_HW6 


 */ 
//complete code listing for controllers/guest/index.php
session_start();
include_once 'models/users_repository.php';
include_once 'models/food_repository.php';
include_once 'models/category_repository.php';
include_once 'models/food.php';
include_once 'models/category.php';


// If the user isn't logged in, force the user to login
if (!isset($_SESSION['is_valid_admin'])) {
    $action = "login";
} else {
    $hasAction = isset($_GET['action']);
    if ($hasAction) {
        $action = $_GET['action'];
    } else {
        $action = 'list_foods';
    }
}

$content = include_once "controllers/admin/$action.php";
return $content;