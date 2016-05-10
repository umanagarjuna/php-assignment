<?php
/*  


 * Student Info: Name=Uma Nagarjuna Reddy, ID=16819

 * Subject: CS526A_Homework6_Spring_2016

 * Author: umanagarjuna 

 * Filename: list_foods.php 

 * Date and Time: Apr 26, 2016 12:36:55 AM 

 * Project Name: UmaNagarjunaReddy_16819_CS526A_HW6 


 */ 
require_once('util/secure_connection.php');  // require a secure connection
//require_once('/util/is_administrator_http.php');  // require a valid admin user

$category_id = 1;
if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
}
$categories = CategoryRepository::getCategories();
$category = CategoryRepository::getCategory($category_id);
$foods = FoodRepository::getFoodsByCategory($category_id);
return 'views/manage_food_list_view.php';

