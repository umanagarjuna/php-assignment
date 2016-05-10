<?php
/*  


 * Student Info: Name=Uma Nagarjuna Reddy, ID=16819

 * Subject: CS526A_Homework6_Spring_2016

 * Author: umanagarjuna 

 * Filename: api.php 

 * Date and Time: Apr 8, 2016 12:36:55 AM 

 * Project Name: UmaNagarjunaReddy_16819_CS526A_HW6 


 */ 

include_once 'db/db_connect.php';
include_once 'models/food_repository.php';
include_once 'models/category_repository.php';
include_once 'models/food.php';
include_once 'models/category.php';

class foodJson implements JsonSerializable{
         private $id, $foodid, $title, $price, $category;
    
        public function __construct($id, $foodid, $title, $price, $category) {
            $this->id = $id;
            $this->foodid = $foodid;
            $this->title = $title;
            $this->price = $price;
            $this->category = $category;
        }
        public function jsonSerialize() {
            return [
                'id' => $this->id,
                'foodid' => $this->foodid,
                'title' => $this->title,
                'price' => $this->price,
                'category' => $this->category
            ];
        }
        public function getID() {
            return $this->id;
         }
        public function getFoodID() {
            return $this->foodid;
         }
        public function getTitle() {
            return $this->title;
        }
        public function getPrice() {
            return $this->price;
        }
        public function getCategory() {
            return $this->category;
        }
    }
    $food = array();
    
    

function restActionGet($category_id, $id) {
    //$category_id = 1;

    $categories = CategoryRepository::getCategories();
    $category = CategoryRepository::getCategory($category_id);
    $foods = FoodRepository::getFoodsByCategory($category_id);
    //$foods = FoodRepository::getFoods();
    //$data = new stdClass();
    global $food;

    
        foreach ($foods as $foodt) {
            $temp = new foodJson($foodt->getID(), $foodt->getFOODID(), $foodt->getTitle(), $foodt->getPrice(), $category_id);
            if(empty($id)){
             $food[] = $temp;
            }
            else{
                if($id==$foodt->getID()){
                    $food = $temp;
                    break;
                }
            }
        }
        
        
}


function restActionPost($request) {
    $foodid = $request->{'foodid'};
    $title = $request->{'title'};
    $price= $request->{'price'};
    $category=$request->{'category'};
    $foodRec = new Food($foodid, $title, $price, $category);
    $food_id = FoodRepository::addFoodRest($foodRec); 
    return $food_id;
}

function restActionPut($request,$id) {
    $foodid = $request->{'foodid'};
    $title = $request->{'title'};
    $price= $request->{'price'};
    $category=$request->{'category'};
    $foodRec = new Food($foodid, $title, $price, $category);
    $food_id = FoodRepository::updateFood($foodRec,$id); 
    return $food_id;
}

class foods {
   
    static public function get($id) {
        global $food;
        return $food;
    }
    static public function post($request) {
        //echo "Create a Book";
        $food_id = restActionPost($request);
        //return $food->{'id'};
        return $food_id;
    }
    static public function put($food, $id) {
        //echo "Update a Book";
        $id=restActionPut($food,$id);
        return $id;
    }
     static public function delete($id) {
        //echo "Delete a Book";
        FoodRepository::deleteFood($id);
        return $id;
    }
}

$request = explode('/', $_GET['PATH_INFO']);

array_shift($request);
//print_r($request);
$resource = array_shift($request);


class doRest{
   
    static public function action($category, $id) {
       switch ($category) {
         case "dinner":
            restActionGet(3,$id); 
            break;
         case "lunch":
            restActionGet(2,$id); 
            break;
         case "breakfast":
            restActionGet(1,$id); 
            break;
        default :
            break;
    }
  }
    
}

// only process valid resources
$resources = array('dinner' => true,'lunch' => true,'breakfast' => true);
if (!array_key_exists($resource, $resources)) {
    http_response_code(404);
    exit;
}
// route the request to the appropriate function based on method
$method = strtolower($_SERVER["REQUEST_METHOD"]);
switch ($method) {
    case 'get':
        $id = array_shift($request);
        doRest::action($resource, $id);
        $food = foods::get($id ); // Returns id of 1234
        $json = json_encode($food);
        http_response_code(200); // OK
        header('Content-Type: application/json');
        print $json;
        break;
     
     case 'post':
        $body = file_get_contents('php://input');
        switch (strtolower($_SERVER['HTTP_CONTENT_TYPE'])) {
            case "application/json":
                $food = json_decode($body);
                break;
            case "text/xml":
                // parsing here
                break;
            default:
                $food = json_decode($body);
        }
        // Validate input

        // Create new Resource
        //$id = call_user_func(array($resource, $method), $request);
       // $id = $food['id'];
        
        $id = foods::post($food); // Returns id of 1234
        $json = json_encode(array('id' => $id));
        http_response_code(201); // Created
        $site = 'localhost';
        //header("Location: $site/" . $_SERVER['REQUEST_URI'] . "/$id");
        header('Content-Type: application/json');
        print $json;
        break;
    case 'put':
        $body = file_get_contents('php://input');
        switch (strtolower($_SERVER['HTTP_CONTENT_TYPE'])) {
            case "application/json":
                $food = json_decode($body);
                break;
            case "text/xml":
                // parsing here
                break;
            default:
               $food =  json_decode($body);
                //print_r($_SERVER['HTTP_CONTENT_TYPE']);
        }
        // Validate input

        // Modify the Resource
        $id = array_shift($request);
        //print_r($food);
        //print $id;
        $id = foods::put($food,$id); // Uses id from request
        //$json = json_encode(array('id' => $id));
        //print $json;
        http_response_code(204); // No conent
        break;
    case 'delete':
        // Delete the Resource    
        $id = array_shift($request);
        $id = foods::delete($id); // Uses id from request
        http_response_code(204); // No conent
        break;
    default:
        http_response_code(405);
}