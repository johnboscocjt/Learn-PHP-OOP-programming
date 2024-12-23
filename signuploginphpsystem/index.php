<?php
// link the view files in order to connect the files and the displays
require_once 'includes/signup_view.inc.php';
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- you are logged in as -->
     <h3>
        <?php
            output_username(); 
        ?>
     </h3>

     <!-- written to make sure the html can be displayed -->
     <?php 
        if (!isset($_SESSION["user_id"])){?>
            <h3>Login</h3>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">

                <button>Login</button>
            </form>

    <?php }?>


    <!-- place for outputting any errors realted with the login system -->
     <?php
        // function to check the login errors, since its going to output sth in the website then it should go to the login_view
        check_login_errors();

     ?>
    

    <h3>Sign Up</h3>
    <form action="includes/signup.inc.php" method="post">
       <!-- show the data in the form -->
        <?php
         signup_inputs();
        ?>
        <button>Signup</button>
    </form>

    <?php
    // show the errors from the view 
    check_signup_errors();

    ?>

    <h3>Logout</h3>
    <form action="includes/logout.inc.php" method="post">
       

        <button>Logout</button>
    </form>



</body>
</html>