<?php
/*  


 * Student Info: Name=Uma Nagarjuna Reddy, ID=16819

 * Subject: CS526A_Homework6_Spring_2016

 * Author: umanagarjuna 

 * Filename: food.php 

 * Date and Time: Apr 8, 2016 12:36:55 AM 

 * Project Name: UmaNagarjunaReddy_16819_CS526A_HW6 


 */ 
class Food {
    private $id, $foodid, $title, $price, $category;
    
    public function __construct($foodid, $title, $price, $category) {
        $this->foodid = $foodid;
        $this->title = $title;
        $this->price = $price;
        $this->category = $category;
    }
    
    public function setID($id) {
        $this->id = $id;
    }
    public function getID() {
        return $this->id;
    }
    public function setFOODID($foodid) {
        $this->foodid = $foodid;
    }
    public function getFOODID() {
        return $this->foodid;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function getTitle() {
        return $this->title;
    }
    public function setPrice($price) {
        $this->price = $price;
    }
    public function getPrice() {
        return $this->price;
    }
    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = $category;
    }
    public function getFormattedPrice() {
        $formatted_price = number_format($this->price, 2);
        return $formatted_price;
    }
    public function getDiscountedPercentage() {
        $discount_percent = 10;
        return $discount_percent;
    }
    public function getDiscountAmount() {
        $discount_percent = $this->getDiscountedPercentage() / 100;
        $discount_amount = $this->price * $discount_percent;
        $discount_amount = round($discount_amount, 2);
        $discount_amount = number_format($discount_amount, 2);
        return $discount_amount;
    }
    public function getDiscountPrice() {
        $discount_price = $this->price - $this->getDiscountAmount();
        $discount_price = number_format($discount_price, 2);
        return $discount_price;
    }
    public function getImageFilename() {
        $image_filename = $this->foodid.'.png';
        return $image_filename;
    }
    public function getImagePath() {
        $image_path = 'img/'.$this->getImageFilename();
        return $image_path;
    }
    public function getImageAltText() {
        $image_alt = 'Image: '.$this->getImageFilename();
        return $image_alt;
    }
}

?>
