<?php
// changing ini settings in the code
ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

// change the cookie parameters
session_set_cookie_params([
    'lifetime' => 1000,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();

// checking if user is logged in the website
if(isset($_SESSION["user_id"])){
    // if user is logged in the website, generate the function that will do the appending of the id

        // if condition to run after a certain amount of time to regenerate the cookie
        if(!isset($_SESSION["last_regeneration"])){
            regenerate_session_id_loggedin();
            $_SESSION["last_regeneration"] = time();
        }else{
            // update the session idafter a certain time interval
            $interval = 60 * 30;
            if(time() -   $_SESSION["last_regeneration"] >= $interval){
                // regenerate the new id
                regenerate_session_id_loggedin();
            }
        }


}else{
    
    // if condition to run after a certain amount of time to regenerate the cookie
    if(!isset($_SESSION["last_regeneration"])){
        session_regenerate_id();
        $_SESSION["last_regeneration"] = time();
    }else{
        // update the session idafter a certain time interval
        $interval = 60 * 30;
        if(time() -   $_SESSION["last_regeneration"] >= $interval){
            // regenerate the new id
            regenerate_session_id();
        }
    }

}

// function to regenerate the session id to avoid duplication of the code 
function regenerate_session_id(){
    session_regenerate_id();
    $_SESSION["last_regeneration"] = time();
}

// function for when we are logged in
function regenerate_session_id_loggedin(){
    session_regenerate_id(true);
        // user id from the session variable
        $userId = $_SESSION["user_id"];

       // creating a new session id entirely
       $newSessionId = session_create_id();

       // Appending the user id and the session id
       $sessionId = $newSessionId . "" . $userId;

       // setting the new session id
       session_id($sessionId);

    $_SESSION["last_regeneration"] = time();
}