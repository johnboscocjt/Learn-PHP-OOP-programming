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
            $query = "INSERT INTO users (username,pwd,email) VALUES ( :username, :pwd, :email);";

            // prepared statement
            // giving the data that user submitted
            $stmt = $pdo->prepare($query);
            

            $options = [
                // you can use it to slow the hacking process
                'cost' => 12
            ];
            $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);



            //bind user data to the named parameters
            $stmt->bindParam(":username", $username); 
            $stmt->bindParam(":pwd", $hashedPwd); 
            $stmt->bindParam(":email", $email); 

             // submit the data
             $stmt ->execute();

            // free up resources, and closing up connection
            $pdo = null;
            $stmt = null;

            // redirect user to a page
            header("Location: ../index.php");

            // use die or exit,to kill script
            die();
          
        } catch (PDOException $e) {
            die("Query Failed: ". $e->getMessage());
        }


}else{
    // redirect user trying to access illegally
    header("Location: ../index.php");
}
