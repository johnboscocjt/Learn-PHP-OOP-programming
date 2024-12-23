<?php 

declare(strict_types=1);

// you are logged in as
function output_username(){
    if(isset($_SESSION["user_id"])){
        echo "You are logged in as"."<br>". $_SESSION["user_username"];
    }else{
        echo "You are not logged in";
    }
}

// function from the index page which outputs the errors that comes when user login
function check_login_errors(){
    if(isset($_SESSION["errors_login"])){
        $errors = $_SESSION["errors_login"];

        echo "<br>";

        // take the all login info
        foreach ($errors as $error ) {
            echo '<p class="form-error">'. $error . '</p>';
        }

        unset($_SESSION["errors_login"]);
    }elseif(isset($_GET['login']) && $_GET['login'] === "success"){
        // success message 
        echo '<br>';
        echo '<p class="form-success">Login success!</p>';
    }
}