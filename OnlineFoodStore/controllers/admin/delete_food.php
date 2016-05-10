<?php
/*  


 * Student Info: Name=Uma Nagarjuna Reddy, ID=16819

 * Subject: CS526A_Homework6_Spring_2016

 * Author: umanagarjuna 

 * Filename: delete_food.php 

 * Date and Time: Apr 26, 2016 12:36:55 AM 

 * Project Name: UmaNagarjunaReddy_16819_CS526A_HW6 


 */ 
// Get the IDs
//require_once('util/secure_connection.php');  // require a secure connection
//require_once('/util/is_administrator_http.php');  // require a valid admin user
$food_id = $_POST['food_id'];
$category_id = $_POST['category_id'];

// Delete the book
FoodRepository::deleteFood($food_id);

// Display the Book List page for the current publisher
header("Location: .?controller=admin&category_id=$category_id");

