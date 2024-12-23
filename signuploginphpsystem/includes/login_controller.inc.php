<?php
declare(strict_types=1);

// checking if the usename and password are empty
function is_input_empty(string $username, string $pwd){
    if(empty($username) || empty($pwd)){
        return true;
    }else{
        return false;
    }
}
// function to get the user and check if the user exists in the database
// checking if username exists in the databas and if the password actually match

// grab the user and all the user details
// combining the array and boolean datatype
function is_username_wrong(bool|array $result){
//    checking if there any user in the database
    if(!$result){
    return true;
   }else{
    return false;
   }

}

function is_password_wrong(string $pwd, string $hashedPwd){
    if(!password_verify($pwd, $hashedPwd)){
        return true;
       }else{
        return false;
       }
    
}