<?php
/*  


 * Student Info: Name=Uma Nagarjuna Reddy, ID=16819

 * Subject: CS526A_Homework6_Spring_2016

 * Author: umanagarjuna 

 * Filename: login_view.php 

 * Date and Time: Apr 8, 2016 12:36:55 AM 

 * Project Name: UmaNagarjunaReddy_16819_CS526A_HW6 


 */ 
?>
<h1>Login Page</h1>
<div id="main">
    <h1>Login</h1>
    <form action="?controller=admin&action=login" method="post">
        <label>Email:</label>
        <input type="text" name="email" value="<?php echo $email; ?>"/>
        <br />

        <label>Password:</label>
        <input type="password" name="password" />
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="Login" name="login_submitted"/>
    </form>

    <p><?php echo $login_message; ?></p>

</div>
