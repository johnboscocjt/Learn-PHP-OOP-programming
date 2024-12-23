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

            // 1.using prepared statement without named parameters
            $query = "INSERT INTO users (username,pwd,email) VALUES ( ?, ?, ?);";

          

            // prepared statement
            // giving the data that user submitted
            $stmt = $pdo->prepare($query);
            // submit the data
            $stmt ->execute([$username, $pwd, $email]);
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



