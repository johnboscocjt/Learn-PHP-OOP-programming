<?php
// page with the login information 

// checking if user accessed the page in the right ay
if($_SERVER["REQUEST_METHOD"] === "POST"){
    // grab the data used for the login
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        //code to check for error handlers and related stuffs
            // but first create a login controller, login view, and the login model(MVC)
        // require the MVC files one at a time in the order after the database connection using the pdo object
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_controller.inc.php';

          // error handlers:
        // error array to catch any errors that occur
        $errors= [];

        // check if submitted data is empty
        if (is_input_empty($username,  $pwd)){
            // key-value pair of array 
            $errors["empty_input"] = "Fill in all the fields";
        }
     
        // grab the data where the username is equal to that submitte username
        // grab the user from the login model file inthe function
        $result = get_user($pdo,$username);

        // checking if the username is wrong 
        if(is_username_wrong($result)){
            // returning the error if no user found after being queried from the database
            $errors["login_incorrect"] = ["Incorrect log info!"];
        }

        // cheking if the password actually match
        if(!is_username_wrong($result) && is_password_wrong($pwd, $result["pwd"])){
            $errors["login_incorrect"] = "Incorrect login info!";
        }

        // start the session in a much more safer way than using the session_start
        require_once 'config_session.inc.php';
        if($errors){
            $_SESSION["errors_login"] = $errors;

        //removed the functionality not to retype

            header("Location: ../index.php");

            // exit the script if there some errors
            die();
        }

        // creating a new session id entirely
        $newSessionId = session_create_id();

        // Appending the user id and the session id
        $sessionId = $newSessionId . "" . $result["id"];

        // setting the new session id
        session_id($sessionId);

        // setting the user inside the website
        // setting the id from config_session equal to id from the database query
        $_SESSION["user_id"] = $result["id"];
        // sanitize the data 
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);

        $_SESSION["last_regeneration"] = time();

        header("Location: ../index.php?loginsuccess");

        // closing the connection
        $pdo = null;
        $statement = null;

        // terminate
        die();

    }  catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
    }

}else{
    // redirect the user back one directory, if didnt login as required 
    header("Location: ../index.php");
    die();

}