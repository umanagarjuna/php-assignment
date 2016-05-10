<?php
/*  


 * Student Info: Name=Uma Nagarjuna Reddy, ID=16819

 * Subject: CS526A_Homework6_Spring_2016

 * Author: umanagarjuna 

 * Filename: cart_view.php 

 * Date and Time: Apr 8, 2016 12:36:55 AM 

 * Project Name: UmaNagarjunaReddy_16819_CS526A_HW6 


 */ 
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Restaurant</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>

        <header>
            <h1>Online foodstore</h1>
        </header>
        <section id="main">

            <h1>Your Cart</h1>
            <?php if (!isset($_SESSION['shop_cart']) || count($_SESSION['shop_cart']) == 0) : ?>
                <p>There are no food items in your cart.</p>
            <?php else: ?>
                <form action="?controller=viewcart&action=update" method="post">
                    
                    <table>
                        <tr id="cart_header">
                            <th>Food</th>
                            <th>Food Price</th>
                            <th>Quantity</th>
                            <th>Food Total</th>
                        </tr>

                        <?php
                        foreach ($_SESSION['shop_cart'] as $uniqid => $food) :
                            $price = number_format($food['price'], 2);
                            $total = number_format($food['total'], 2);
                            ?>
                            <tr>
                                <td>
                                    <?php echo $food['title']; ?>
                                </td>
                                <td>
                                    $<?php echo $price; ?>
                                </td>
                                <td>
                                    <input type="text"
                                           name="newqty[<?php echo $uniqid; ?>]"
                                           value="<?php echo $food['qty']; ?>"/>
                                </td>
                                <td>
                                    $<?php echo $total; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3"><b>Subtotal</b></td>
                            <td>$<?php echo get_subtotal(); ?></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <input type="submit" value="Update Cart"/>
                            </td>
                        </tr>
                    </table>
                    <p>Click "Update Cart" to update quantities in your
                        cart. Enter a quantity of 0 to remove a food.
                    </p>
                </form>
            <?php endif; ?>
                
             <form action="?controller=viewcart&action=emptycart" method="post">  
                 <table>
                     <tr>
                            <td colspan="4">
                                <input type="submit" value="Empty Cart"/>
                            </td>
                     </tr>
                 </table>
                 
             </form>

        </section>
    </body>
</html>
