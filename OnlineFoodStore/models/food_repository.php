<?php
/*  


 * Student Info: Name=Uma Nagarjuna Reddy, ID=16819

 * Subject: CS526A_Homework6_Spring_2016

 * Author: umanagarjuna 

 * Filename: food_repository.php 

 * Date and Time: Apr 8, 2016 12:36:55 AM 

 * Project Name: UmaNagarjunaReddy_16819_CS526A_HW6 


 */ 
class FoodRepository {
  public static function getFoods() {
        global $db;
        $query = 'SELECT * FROM foods '
            . 'ORDER BY uniqid';
       try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
         $foods = array();
        foreach ($result as $row) {
            $category = $row['categoryID'];
            $food = new Food($row['uniqid'], $row['foodTitle'], $row['foodPrice'], $category);
            $food->setID($row['foodID']);
            $foods[] = $food;
        }
        return $foods;
		} catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
      }
    }

    
public static function updateFood($food, $id) {
        global $db;
        $category_id = $food->getCategory();
        $foodid = $food->getFOODID();
        $title = $food->getTitle();
        $price = $food->getPrice();
	
        $query = 'UPDATE foods SET uniqid = :uniqid, categoryID = :categoryID, foodTitle = :foodTitle, foodPrice = :foodPrice  WHERE foodID = :foodID';  
	
	try {
		$statement = $db->prepare($query);
		$statement->bindValue(':categoryID', $category_id);
		$statement->bindValue(':uniqid', $foodid);
		$statement->bindValue(':foodTitle', $title);
		$statement->bindValue(':foodPrice', $price);
                $statement->bindValue(':foodID', $id);
		$statement->execute();
		$statement->closeCursor();
		
		return $id;
	} catch (PDOException $e) {
		$error_message = $e->getMessage();
		display_db_error($error_message);
	}    
    }
	
public static function getFoodsByCategory($category_id) {
    global $db;
    $category = CategoryRepository::getCategory($category_id);
    $query = 'SELECT * FROM foods '
            . 'WHERE categoryID = :category_id '
            . 'ORDER BY uniqid';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        $foods = array();
        foreach ($result as $row) {
            $food = new Food($row['uniqid'], $row['foodTitle'], $row['foodPrice'], $category);
            $food->setID($row['foodID']);
            $foods[] = $food;
        }
        return $foods;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
  }
    
  public static function getFood($food_id) {
        global $db;
        $query = 'SELECT * FROM foods WHERE foodID = :food_id';
        try {
		$statement = $db->prepare($query);
		$statement->bindValue(':food_id', $food_id);
		$statement->execute();
		$row = $statement->fetch();
		$statement->closeCursor();
                $category = CategoryRepository::getCategory($row['categoryID']);
                $food = new Food($row['uniqid'], $row['foodTitle'], $row['foodPrice'], $category);
                $food->setID($row['foodID']);
                return $food;
	} catch (PDOException $e) {
		$error_message = $e->getMessage();
		display_db_error($error_message);
	}     
    }
public static function deleteFood($food_id) {
    global $db;
    $query = 'DELETE FROM foods WHERE foodID = :food_id';    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':food_id', $food_id);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

public static function addFood($food) {
        global $db;
        $category_id = $food->getCategory()->getID();
        $foodid = $food->getFOODID();
        $title = $food->getTitle();
        $price = $food->getPrice();
		
	$query = 'INSERT INTO foods
                (categoryID, uniqid, foodTitle, foodPrice)
              VALUES
                (:category_id, :foodid, :title, :price)';
	try {
		$statement = $db->prepare($query);
		$statement->bindValue(':category_id', $category_id);
		$statement->bindValue(':foodid', $foodid);
		$statement->bindValue(':title', $title);
		$statement->bindValue(':price', $price);
		$statement->execute();
		$statement->closeCursor();
		// Get the last product ID that was automatically generated
		$food_id = $db->lastInsertId();
		return $food_id;
	} catch (PDOException $e) {
		$error_message = $e->getMessage();
		display_db_error($error_message);
	}    
    }
    
    public static function addFoodRest($food) {
        global $db;
        $category_id = $food->getCategory();
        $foodid = $food->getFOODID();
        $title = $food->getTitle();
        $price = $food->getPrice();
		
	$query = 'INSERT INTO foods
                (categoryID, uniqid, foodTitle, foodPrice)
              VALUES
                (:category_id, :foodid, :title, :price)';
	try {
		$statement = $db->prepare($query);
		$statement->bindValue(':category_id', $category_id);
		$statement->bindValue(':foodid', $foodid);
		$statement->bindValue(':title', $title);
		$statement->bindValue(':price', $price);
		$statement->execute();
		$statement->closeCursor();
		// Get the last product ID that was automatically generated
		$food_id = $db->lastInsertId();
		return $food_id;
	} catch (PDOException $e) {
		$error_message = $e->getMessage();
		display_db_error($error_message);
	}    
    }

}
?>

