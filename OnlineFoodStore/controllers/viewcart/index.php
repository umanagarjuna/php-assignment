<?php
/*  


 * Student Info: Name=Uma Nagarjuna Reddy, ID=16819

 * Subject: CS526A_Homework6_Spring_2016

 * Author: umanagarjuna 

 * Filename: index.php 

 * Date and Time: Apr 26, 2016 12:36:55 AM 

 * Project Name: UmaNagarjunaReddy_16819_CS526A_HW6 


 */ 
session_start();
include_once 'models/food_repository.php';
include_once 'models/category_repository.php';
include_once 'models/food.php';
include_once 'models/category.php';

$hasAction = isset($_GET['action']);

 $action='';
if($hasAction){
    $action = $_GET['action'];
}
require_once('cart_func.php');
if($action=="emptycart"){
    unset($_SESSION['shop_cart']);
    return 'views/cart_view.php';
}
if ($action == 'update') {
    $new_qty_list = filter_input(INPUT_POST, 'newqty', FILTER_DEFAULT, 
                                     FILTER_REQUIRE_ARRAY);
    foreach ($new_qty_list as $uniqid => $qty) {
        if ($_SESSION['shop_cart'][$uniqid]['qty'] != $qty) {
            update_food($uniqid, $qty);
        }
    }
} 

$food_id = '';

if(isset($_POST['food_id'])){
    $food_id = $_POST['food_id'];
}

$name = filter_input(INPUT_GET, 'name');
 echo $name;
$action = 'cart';
$_SESSION['food_id'] = $food_id;

if (empty($_SESSION['shop_cart'])) {
    $_SESSION['shop_cart'] = array();
}

//$content = include_once 'views/navigation_guest.php';
$content = include_once "controllers/viewcart/$action.php";
return $content;
?>




