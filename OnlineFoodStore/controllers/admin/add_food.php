<?php
/*  


 * Student Info: Name=Uma Nagarjuna Reddy, ID=16819

 * Subject: CS526A_Homework6_Spring_2016

 * Author: umanagarjuna 

 * Filename: add_food.php 

 * Date and Time: Apr 26, 2016 12:36:55 AM 

 * Project Name: UmaNagarjunaReddy_16819_CS526A_HW6 


 */ 
require_once('util/secure_connection.php');  // require a secure connection
require_once('/util/is_administrator_http.php');  // require a valid admin user
$addFoodSubmitted = isset($_POST['addfood_submitted']);
if ($addFoodSubmitted) {
    $category_id = $_POST['category_id'];;
    $foodid = $_POST['foodid'];
    $title = $_POST['food_title'];
    $price = $_POST['food_price'];

    // Validate the inputs
    if (empty($foodid) || empty($title) || empty($price)) {
        $error = "Invalid food data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        $category = CategoryRepository::getCategory($category_id);
        $food = new Food($foodid, $title, $price, $category);
        FoodRepository::addFood($food);

        // Display the Food List page for the current category
        header("Location: .?controller=admin&category_id=$category_id");
    }
}
else
{
    $categories = CategoryRepository::getCategories();
    return 'views/add_food_view.php';
}
