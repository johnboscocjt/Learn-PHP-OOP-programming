<?php

$dsn = "mysql:host=localhost;dbname=myfirstdatabase";
$dbusername = "root";
$dbpassword = "";

try {
    //instatiatenew pdo object inside php
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    // grab pdo object now, it is not a variable anymore
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Failed: ". $e->getMessage();
    
}
