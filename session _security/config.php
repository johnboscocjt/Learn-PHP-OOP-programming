<?php

// setting the vaue to true = 1, php.ini
ini_set('session.use_only_cookies', 1);


// website use the actual id created by the sever inside the website
ini_set('session.use_strict_mode', 1);

// session parameters
session_set_cookie_params([
    'lifetime' => 18000,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true,

]);

// start session
session_start();

// function to generate a strong session id
// session_regenerate_id(true);

if(!isset($_SESSION['last_regeneration'])){

    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
} else {
    // update session after 30minutes
    $interval = 60 * 30;

    if(time() - $_SESSION['last_regenration'] >= $interval) {

        // regenerate session id
        session_regenerate_id(true);

        // update the last session regeneration timestamp
        $_SESSION['last_regeneration'] = time();
    }
}