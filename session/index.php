<?php
// start a session
session_start();

// session data or session variable that is equal to a string called Johnbosco
$_SESSION["username"] = "Johnbosco";

// unset or delete specific/single session variable
// unset($_SESSION["username"]);

// unset all the session data
// session_unset();

// stop the session from running again
session_destroy();





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo $_SESSION["username"] = "Johnbosco";

    ?>
</body>
</html>