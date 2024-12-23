<?php  
// session start in order to destroy a session
session_start();

session_unset();

session_destroy();

// send the user to a page with redirection
header("Location: ../index.php");
die();