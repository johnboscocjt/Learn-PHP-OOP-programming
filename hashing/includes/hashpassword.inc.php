<?php
$pwdSignup = "Johnbosco";

// hashing password
// password_hash($pwd, PASSWORD_DEFAULT);

// password_hash($pwd, PASSWORD_BCRYPT, 12);
$options = [
    // you can use it to slow the hacking process
    'cost' => 12
];

$hashedPwd = password_hash($pwdSignup, PASSWORD_BCRYPT, $options);

$pwdLogin = "Johnbosco";
password_verify($pwdLogin, $hashedPwd);

if (password_verify($pwdLogin, $hashedPwd)){
    echo "They are the same";

} else{
    echo "They are not the same!";

}