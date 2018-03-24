<?php
class Product{
 
    // database connection and table name
    private $conn;
    private $table_name = "videos";
 
    // object properties
    public $title;
    public $url;
    public $description;
    public $thumbnail;
    public $category_id;
    public $category_name;
    public $singer;
    public $lyricist;
    public $duration;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
function read(){

    // select all query
    $query = "SELECT
                title, url, description, thumbnail, category_id, category_name, singer, lyricist, duration
            FROM
            $this->table_name";

    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // execute query
    $stmt->execute();

    return $stmt;
}

 // used when filling up the update product form
 function readByCategory(){
  // query to read single record
  $query = "SELECT
                title, url, description, thumbnail, category_id, category_name, singer, lyricist, duration
            FROM
            $this->table_name
          WHERE
              category_id = $_GET[category_id] ";

  // prepare query statement
  $stmt = $this->conn->prepare( $query );

  // execute query
  $stmt->execute();

  return $stmt;
}

 // used when filling up the update product form
 function categoryName(){
  $query = "SELECT
  title, url, description, thumbnail, category_id, category_name, singer, lyricist, duration
FROM
$this->table_name
WHERE
category_id = $_GET[category_id] 
LIMIT
0,1";

// prepare query statement
$stmt = $this->conn->prepare( $query );

// execute query
$stmt->execute();

return $stmt;
}

}