<?php
/*  


 * Student Info: Name=Uma Nagarjuna Reddy, ID=16819

 * Subject: CS526A_Homework6_Spring_2016

 * Author: umanagarjuna 

 * Filename: cart.php 

 * Date and Time: Apr 26, 2016 12:36:55 AM 

 * Project Name: UmaNagarjunaReddy_16819_CS526A_HW6 


 */ 
$food_id = $_SESSION['food_id'];

require_once('cart_func.php');
$food = FoodRepository::getFood($food_id);

$fooditem = '';
   
$title = $food->getTitle();
if($title==''){
    $title = '';
    $price = '';
    $quantity = '';
    $total = '';
    $uniqid = '';
    
}
else{

$price = $food->getDiscountPrice();
$quantity = 1;
$total = $food->getDiscountPrice();
$uniqid = $food->getFOODID();
 $fooditem = array(
        'title' => $title,
        'price' => $price,
        'qty'  => $quantity,
        'total' => $total
    );
}

if($title!=''){
 if(empty($_SESSION['shop_cart'][$uniqid])){
    $_SESSION['shop_cart'][$uniqid] = $fooditem;
 }
 else if ($action == 'update') {
    $new_qty_list = filter_input(INPUT_POST, 'newqty', FILTER_DEFAULT, 
                                     FILTER_REQUIRE_ARRAY);
    foreach ($new_qty_list as $uniqid => $qty) {
        if ($_SESSION['shop_cart'][$uniqid]['qty'] != $qty) {
            update_food($uniqid, $qty);
        }
    }
} 
 else{
     $quantity = $_SESSION['shop_cart'][$uniqid]['qty'];
     $_SESSION['shop_cart'][$uniqid]['qty'] = $quantity+1;
     
 }
}
return 'views/cart_view.php';


