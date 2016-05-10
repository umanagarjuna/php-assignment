<?php

/*  


 * Student Info: Name=Uma Nagarjuna Reddy, ID=16819

 * Subject: CS526A_Homework6_Spring_2016

 * Author: umanagarjuna 

 * Filename: cart_func.php 

 * Date and Time: Apr 26, 2016 12:36:55 AM 

 * Project Name: UmaNagarjunaReddy_16819_CS526A_HW6 


 */ 
function update_food($uniqid, $quantity) {
    global $foods;
    $quantity = (int) $quantity;
    if (isset($_SESSION['shop_cart'][$uniqid])) {
        if ($quantity <= 0) {
            unset($_SESSION['shop_cart'][$uniqid]);
        } else {
            $_SESSION['shop_cart'][$uniqid]['qty'] = $quantity;
            $total = $_SESSION['shop_cart'][$uniqid]['price'] *
                     $_SESSION['shop_cart'][$uniqid]['qty'];
            $_SESSION['shop_cart'][$uniqid]['total'] = $total;
        }
    }
}
// Get cart subtotal
function get_subtotal() {
    $subtotal = 0;
    foreach ($_SESSION['shop_cart'] as $food) {
        $subtotal += $food['total'];
    }
    $subtotal = number_format($subtotal, 2);
    return $subtotal;
}
?>