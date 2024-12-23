<?php
declare(strict_types=1);
// function to get the user and check if the user exists in the database

// grab the user and all the user details
function get_user(object $pdo, string $username){
    // query everything from the db
    $query = "SELECT * FROM users WHERE username = :username;";
    // do it a secured way using the prepared  statements
    $stmt = $pdo->prepare($query);
    // bind the data to the query  and send the data separately
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    // grab just one piece of data from the database unlike the fetch all 
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
    // data should be returned as a boolean and an array to the login_model, so that when there is no user we should not get any errors

}
