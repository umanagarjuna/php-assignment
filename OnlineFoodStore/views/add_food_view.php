<?php
/*  


 * Student Info: Name=Uma Nagarjuna Reddy, ID=16819

 * Subject: CS526A_Homework6_Spring_2016

 * Author: umanagarjuna 

 * Filename: add_food_view.php 

 * Date and Time: Apr 8, 2016 12:36:55 AM 

 * Project Name: UmaNagarjunaReddy_16819_CS526A_HW6 


 */ 
require_once('util/secure_connection.php');  // require a secure connection
require_once('/util/is_administrator_http.php');  // require a valid admin user
$hasCategories = isset($categories);
if ($hasCategories === false) {
    echo '<h1>views/add_food_view.php needs $categories</h1>';
    exit();
}
?>

<h1>Add Food Page</h1>
<div id="main">
    <form action="?controller=admin&action=add_food" method="post">
        <input type="hidden" name="action" value="add_food" />

        <label>Category:</label>
        <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category->getID(); ?>">
                    <?php echo $category->getName(); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br />
        <label>FOODID:</label>
        <input type=text" name="foodid" /> 
        <br />
        <label>Title:</label>
        <input type=text" name="food_title" /> 
        <br />
        <label>Price:</label>
        <input type=text" name="food_price" /> 
        <br />
        <label>&nbsp;</label>
        <input type="submit" value="Add Food" name="addfood_submitted" /> 
        <br />
    </form>
</div>