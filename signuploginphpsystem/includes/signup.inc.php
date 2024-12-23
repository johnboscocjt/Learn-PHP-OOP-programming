<?php
// checking if user accessed the page in the right ay
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        //link the connection
            // MVC model order after the connection
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_controller.inc.php';

        // error handlers:
        // error array to catch any errors that occur
        $errors= [];

        // check if submitted data is empty
        if (is_input_empty($username,  $pwd, $email)){
            // key-value pair of array 
            $errors["empty_input"] = "Fill in all the fields";
        }
        // check the validity of the email
        if(is_email_invalid($email)){
            $errors["invalid_email"] = "Invalid email used!";

        }
        // check whether the username is already taken
        if(is_username_taken($pdo, $username)){
            $errors["username_taken"] = "username already taken!";

        }

        // check whether the email is verified
        if(is_email_registered($pdo, $email)){
            $errors["email_used"] = "Email already registered!";

        }

        // start the session in a much more safer way than using the session_start
        require_once 'config_session.inc.php';
        if($errors){
            $_SESSION["errors_signup"] = $errors;

            // creating an array that will contain the sent data so that user doesnt retype incase of any errors
            // add data as an associative array i.e value-key pair
            $signupData = [
                "username" => $username,
                "email" => $email
            ];
            // update the session variables used in the signup
            $_SESSION["signup_data"] = $signupData;

            header("Location: ../index.php");

            // exit the script if there some errors
            die();
        }

        // creating user
        create_user($pdo,$username, $pwd, $email);
        header("Location: ../index.php?signup=success");

        // close the connection
        $pdo = null;
        $stmt = null;


    } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
    }

}else{
    // redirect the user back one directory
    header("Location: ../index.php");
    die();
}