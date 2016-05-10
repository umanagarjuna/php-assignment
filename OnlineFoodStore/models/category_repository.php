<?php
/*  


 * Student Info: Name=Uma Nagarjuna Reddy, ID=16819

 * Subject: CS526A_Homework6_Spring_2016

 * Author: umanagarjuna 

 * Filename: category_repository.php 

 * Date and Time: Apr 8, 2016 12:36:55 AM 

 * Project Name: UmaNagarjunaReddy_16819_CS526A_HW6 


 */ 
class CategoryRepository {

  public static function getCategories() {
    global $db;
    $query = 'SELECT * FROM categories ORDER BY categoryID';
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        $categories = array();
        foreach ($result as $row) {
            $category = new Category($row['categoryID'], $row['categoryName']);
            $categories[] = $category;
        }
        return $categories;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

   public static function getCategory($category_id) {
        global $db;
        $query = 'SELECT * FROM categories WHERE categoryID = :category_id';
		try {
			$statement = $db->prepare($query);
			$statement->bindValue(':category_id', $category_id);
			$statement->execute();
			$row = $statement->fetch();
			$statement->closeCursor();
			$category = new Category($row['categoryID'], $row['categoryName']);
			return $category;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			display_db_error($error_message);
		}
    }

}
