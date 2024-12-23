<?php

if($_SERVER['REQUEST_METHOD']== "POST"){
    // grab the data
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

        try {
            // grab connection to the database
            require_once "dbh.inc.php";

            // creating query to send to the database
            // below is not good becauseof sql injection
            // $query = "INSERT INTO users (username,pwd,email) VALUES ( $username, $pwd, $email);";


            // 2.using prepared statement with named parameters
            $query = "UPDATE users SET  username = :username, pwd = :pwd, email = :email WHERE id = 2;";

            // prepared statement
            // giving the data that user submitted
            $stmt = $pdo->prepare($query);
            
            //bind user data to the named parameters
            $stmt->bindParam(":username", $username); 
            $stmt->bindParam(":pwd", $pwd); 
            $stmt->bindParam(":email", $email); 

             // submit the data
             $stmt ->execute();

            // free up resources, and closing up connection
            $pdo = null;
            $stmt = null;

            // redirect user to a page
            header("Location: ../index1.php");

            // use die or exit,to kill script
            die();
          
        } catch (PDOException $e) {
            die("Query Failed: ". $e->getMessage());
        }


}else{
    // redirect user trying to access illegally
    header("Location: ../index1.php");
}
