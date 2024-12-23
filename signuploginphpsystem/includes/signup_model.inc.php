<?php

declare(strict_types=1);

// function to query the database and check whether the username is already taken
function get_username(object $pdo, string $username){
    // querying from the databse 
    $query = "SELECT username FROM users WHERE username = :username;";
    // do it a secured way using the prepared  statements
    $stmt = $pdo->prepare($query);
    // bind the data to the query  and send the data separately
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    // grab just one piece of data from the database unlike the fetch all 
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}   

// function to check if the email is registered
function get_email(object $pdo, string $email){
    // querying from the databse 
    $query = "SELECT username FROM users WHERE email = :email;";
    // do it in a secured way using the prepared  statements
    $stmt = $pdo->prepare($query);
    // bind the data to the query  and send the data separately
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    // grab just one piece of data from the database unlike the fetch all 
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}   

// function to create  a user 
function set_user($pdo, $username, $pwd, $email){
    // querying from the databse 
    $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);";
    // do it in a secured way using the prepared  statements
    $stmt = $pdo->prepare($query);

    // hash the password before binding it
    $options = [
        // asssign
        'cost' => 12
    ];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    // bind the data to the query  and send the data separately
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pwd", $hashedPwd);
    $stmt->bindParam(":email", $email);

    $stmt->execute();


}
