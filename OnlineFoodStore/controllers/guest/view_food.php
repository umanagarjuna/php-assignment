<?php
/*  


 * Student Info: Name=Uma Nagarjuna Reddy, ID=16819

 * Subject: CS526A_Homework6_Spring_2016

 * Author: umanagarjuna 

 * Filename: view_food.php 

 * Date and Time: Apr 26, 2016 12:36:55 AM 

 * Project Name: UmaNagarjunaReddy_16819_CS526A_HW6 


 */ 
$food_id = 1;
if (isset($_GET['food_id'])) {
    $food_id = $_GET['food_id'];
}
$categories = CategoryRepository::getCategories();
$food_id = $_GET['food_id'];
$food = FoodRepository::getFood($food_id);
return 'views/food_view.php';