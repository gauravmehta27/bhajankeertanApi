<?php
class Product{
 
    // database connection and table name
    private $conn;
    private $table_name = "enquiry";
 
    // object properties
    public $email;
		public $phone;
		public $concern;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

	 // create product
function create(){
	
		 // query to insert record
		 $query = "INSERT INTO
								 " . $this->table_name . "
						 SET
								 email=:email, phone=:phone, concern=:concern";
	
		 // prepare query
		 $stmt = $this->conn->prepare($query);
	
		 // sanitize
		 $this->name=htmlspecialchars(strip_tags($this->email));
		 $this->phone=htmlspecialchars(strip_tags($this->phone));
		 $this->concern=htmlspecialchars(strip_tags($this->concern));
	
		 // bind values
		 $stmt->bindParam(":email", $this->email);
		 $stmt->bindParam(":phone", $this->phone);
		 $stmt->bindParam(":concern", $this->concern);
	
		 // execute query
		 if($stmt->execute()){
				 return true;
		 }
	
		 return false;
			
 }

}