<?php

declare(strict_types=1);

// do the type declaration by indicating whether it's a string or different datatype that you are dealing with
function is_input_empty(string $username,  string $pwd, string $email){
    if(empty($username)||empty($pwd)||empty($email)){
        return true;

    }else{
        return false;
    }
}

// function to check the validity of the email submitted 
function is_email_invalid(string $email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;

    }else{
        return false;
    }
}

// function to check if the username is taken 
function is_username_taken(object $pdo, string $username){
    if(get_username( $pdo, $username)){
        return true;

    }else{
        return false;
    }
}

// function  to check if email is already taken
function is_email_registered(object $pdo, string $email){
if(get_email($pdo, $email)){
        return true;

    }else{
        return false;
    }
}

// function to create a user, link all the user data that the user submits
function create_user(object $pdo, string $username, string $pwd, string $email){
    // below function is also taken to the model page to help create the user 
   set_user($pdo, $username, $pwd, $email);
}