<?php
// file to set upthe connection

$host = "localhost";
$dbname = "myfirstdatabase";
$dbusername = "root";
$dbpassword = "";

try {
// create a connection object to the databas
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);

    // attributes for the pdo connection
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed" . $e->getMessage());
}
