<?php 
// signup class, what variables are needed and related info
// use the information that the user gave us
// creating the signup function
class signup extends Dbh{
    // properties
    private $username;
    private $pwd;

// create the constructor to assign some values to the class properties
    public function __construct($username, $pwd){
        $this->username = $username;
        $this->pwd = $pwd;
    }
    // create a query that will query the db and signup the user in this sugnup class
    // making the child class, by extending the class with db conection, to access the db connection
    // Dbh i the parent class and the signup class is the child

    // insert the user in the database, it queries the db
    public function insertUser(){
        // create a query statement that goes in the db and insert the user
        $query = "INSERT INTO users ('username', 'pwd') VALUES (:username, :pwd);";

        // done using the prepared statement to avoid sql injection
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":pwd", $this->pwd);
        $stmt->execute();

        // if you create a connect class in this file it will be prioritized instead of the parent class
        // so if you have the method name in two different class instead of using the this keyword use:
        // parent:: which will refer to the parent class
    }

    private function isEmptySubmit(){
    // creating the errors handlers, pivate b'se is sensitive to the db, should not be run outside the class or the object    private function isEmptySubmit(){
        if(isset($this->username) && isset($this->pwd)){
            return false;
        }else{
            // we do have the error messsage
            return true;
        }
    }
    
    public function signupUser(){
        // error handlers
        // if there nan error run the following function
        if($this->isEmptySubmit()){
            header("Location: " . $_SERVER['DOCUMENT_ROOT'] . '/index.php');
            die();
        }

        // if no errors ,signup user using the singnup user function
        $this->insertUser();

    }

   
   
}