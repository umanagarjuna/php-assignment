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
include_once 'models/food_repository.php';
include_once 'models/category_repository.php';
include_once 'models/food.php';
include_once 'models/category.php';

$hasAction = isset($_GET['action']);
if ($hasAction) {
    $action = $_GET['action'];
    if($action ==="empty_cart"){
        $content = include_once "controllers/viewcart/index.php";
        return $content;
    }
} else {
    $action = 'list_foods';
}

//$content = include_once 'views/navigation_guest.php';
$content = include_once "controllers/guest/$action.php";
return $content;
