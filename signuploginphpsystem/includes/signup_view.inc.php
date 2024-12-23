<?php

declare(strict_types=1);

// function for the signup, and incase of an error in the signup
function signup_inputs()
{
    // checking submission and if data already exists
    if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["username_taken"])) {
        echo '<input type="text" name="username" placeholder="Username" 
        value=" ' . $_SESSION["signup_data"]["username"] . ' ">';
    } else {
        // if no errors
        echo '<input type="text" name="username" placeholder="Username">';
    }

    // password
    echo '<input type="password" name="pwd" placeholder="Password">';

    // email
    // checking submission and if data already exists
    if (
        isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_used"])
        && !isset($_SESSION["errors_signup"]["invalid_email"])
    ) {
        echo '<input type="text" name="email" placeholder="E-mail" value=" ' . $_SESSION["signup_data"]["email"] . ' ">';
    } else {
        // if no errors
        echo '<input type="text" name="email" placeholder="E-mail">';
    }
}

function check_signup_errors()
{
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        // unset the session variables, after use 
        unset($_SESSION['errors_signup']);

        // run the error code
        echo "<br>";

        // looping through the errors
        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p> ';
        }

        unset($_SESSION['errors_signup']);
    } elseif (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo '<br>';
        echo '<p class="form-success">Signup success! </p>';
    }
}
