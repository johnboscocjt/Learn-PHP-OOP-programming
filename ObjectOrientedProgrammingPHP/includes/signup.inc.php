<?php 
// condition to check if access is correct by submitting a form
if($_SERVER["REQUEST_METHOD"] === "POST"){
    // grab the data that the user submitted
    $username = $POST["username"];
    $pwd = $_POST["pwd"];

    // go back one directory and access the connection file
        // the order does matter, database gets the highest priority,parent class first
    require_once "../Classes/Dbh.php";
    require_once "../Classes/Signup.php";

    // now create the signup object from the signup class
    $signup = new signup($username, $password);

    // using the signup user method, method should be public since its used outside the class
    $signup->signupUser();

}