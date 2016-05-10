<?php
/*  


 * Student Info: Name=Uma Nagarjuna Reddy, ID=16819

 * Subject: CS526A_Homework6_Spring_2016

 * Author: umanagarjuna 

 * Filename: food_view.php 

 * Date and Time: Apr 8, 2016 12:36:55 AM 

 * Project Name: UmaNagarjunaReddy_16819_CS526A_HW6 


 */ 
$hasFood = isset($food);
$hasCategories = isset($categories);
if ($hasFood === false || $hasCategories === false) {
    echo '<h1>views/food_list_view.php needs $food</h1>';
    exit();
}
?>

<h1>Searching Your Food</h1>
<div id="sidebar">
    <h1>Categories</h1>
    <ul class="nav">
        <!-- display links for all categories -->
        <?php foreach ($categories as $category) : ?>
            <li>
                <a href="?category_id=<?php echo $category->getID(); ?>">
                    <?php echo $category->getName(); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div id="main">
    <h1><?php echo $food->getTitle(); ?></h1>
    <div id="left_column">
        <p>
            <img src="<?php echo $food->getImagePath(); ?>"
                 alt="<?php echo $food->getImageAltText(); ?>" />
        </p>
    </div>

    <div id="right_column">
        <p><b>List Price:</b> $<?php echo $food->getFormattedPrice(); ?></p>
        <p><b>Discount:</b> <?php echo $food->getDiscountedPercentage(); ?>%</p>
        <p><b>Your Price:</b> $<?php echo $food->getDiscountPrice(); ?>
            (You save $<?php echo $food->getDiscountAmount(); ?>)</p>
        <form action="?controller=viewcart&action=index"method="post">
            <input type="hidden" name="action" value="add" />
            <input type="hidden" name="food_id"
                   value="<?php echo $food->getID(); ?>" />
            <b>Quantity:</b>
            <input id="quantity" type="text" name="quantity" value="1" size="2" />
            <br /><br />
            <input type="submit" value="Add to Cart" />
        </form>
    </div>
</div>