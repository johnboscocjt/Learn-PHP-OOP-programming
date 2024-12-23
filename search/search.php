<?php

if($_SERVER['REQUEST_METHOD']== "POST"){
    // grab the data
    $userSearch = $_POST["usersearch"];
   

        try {
            // grab connection to the database
            require_once "dbh.inc.php";

          
            // 2.using prepared statement with named parameters
            $query = "SELECT * FROM comments WHERE username = :usersearch;";

            // prepared statement
            // giving the data that user submitted
            $stmt = $pdo->prepare($query);
            
            //bind user data to the named parameters
            $stmt->bindParam(":usersearch", $userSearch); 
             

             // submit the data
             $stmt ->execute();

            // grab data and set it equal to an array,fetch data as an associative array
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


            // free up resources, and closing up connection
            $pdo = null;
            $stmt = null;

          
        } catch (PDOException $e) {
            die("Query Failed: ". $e->getMessage());
        }


}else{
    // redirect user trying to access illegally
    header("Location: index.php");
}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>

   <h3>Search Results:</h3>
    <?php
        // check if there is data inside the array
        if(empty($results)){
            echo "<div>";
            echo "<p>No results found!</p>";
            echo "</div>";

        }else{
        //   var_dump($results);
        // loop through the multi dimensional array, use htmlspecialchars for outputting data
            foreach($results as $row){
                echo "<div>";
                echo "<h4>". htmlspecialchars($row["username"])."</h4>";
                echo "<p>". htmlspecialchars($row["comment_text"])."</p>";                
                echo "<p>". htmlspecialchars($row["created_at"])."</p>";                
                echo "</div>";
            }
        }

    ?>

    
</body>
</html>