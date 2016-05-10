<?php
/*  


 * Student Info: Name=Uma Nagarjuna Reddy, ID=16819

 * Subject: CS526A_Homework6_Spring_2016

 * Author: umanagarjuna 

 * Filename: manage_food_list_view.php 

 * Date and Time: Apr 8, 2016 12:36:55 AM 

 * Project Name: UmaNagarjunaReddy_16819_CS526A_HW6 


 */ 

require_once('util/secure_connection.php');  // require a secure connection
require_once('/util/is_administrator_http.php');  // require a valid admin user
$hasFoods = isset($foods);
$hasCategories = isset($categories);
if ($hasFoods === false || $hasCategories === false) {
    echo '<h1>views/food_list_view.php needs $foods</h1>';
    exit();
}
?>

<h1>Managing Your Food</h1>
<div id="sidebar">
    <h2>Categories</h2>
    <?php foreach ($categories as $category2) : ?>
        <ul>
            <li>
                <a href="?controller=admin&category_id=<?php echo $category2->getID(); ?>">
                    <?php echo $category2->getName(); ?>
                </a>
            </li>
        </ul>
    <?php endforeach; ?>
</div>
<div id="main">
    <h2><?php echo $category->getName(); ?></h2>
    <table>
        <tr>
            <th>FOODID</th>
            <th>Food Title</th>
            <th>Food Price</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($foods as $food) : ?>
            <tr>
                <td><?php echo $food->getFOODID(); ?></td>
                <td><?php echo $food->getTitle(); ?></td>
                <td><?php echo $food->getPrice(); ?></td>
                <td>
                    <form action="?controller=admin&action=delete_food" method="post">
                        <input type="hidden" name="food_id" 
                               value="<?php echo $food->getID(); ?>" />
                        <input type="hidden" name="category_id" 
                               value="<?php echo $category_id; ?>" />
                        <input type="submit" value="Delete" />
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="?controller=admin&action=add_food">Add Food Item</a></p>
</div>