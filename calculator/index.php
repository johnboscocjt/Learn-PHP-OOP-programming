<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA_Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">

    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="number" name="num01" placeholder="Number one" required>
        <select name="operator">
            <option value="add">+</option>
            <option value="substract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>

        </select>
        <input type="number" name="num02" placeholder="Number two" required>

        <button>Calculate</button>
        <p><?php echo "$value"; ?></p>
    </form>

    <!-- checking everything -->
    <?php
        if($_SERVER["REQUEST_METHOD"]== "GET"){
            // grab the data
            //$num01 = $_POST["num01"];
            //$num01 = $_GET["num01"];
            // sanitize the data input
               $num01 = filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT);
               $num02 = filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT);
               $operator = htmlspecialchars($_POST["operator"]);

            //error handling
            // initially no errors
            $errors = false;
            if (empty($num01) || empty($num01) || empty($num01)){
                echo "<p>Fill in all fields</p>";
                $errors = true;

            }

            if(!is_numeric($num01) || is_numeric($num02)==false ){
                echo "<p>Only write numbers</p>";
                $errors = true;
            }

            //calculate the numbers if no errors 
            if(!$errors){
                $value =0;
                switch($operator){
                    case "add":
                       $value = $num01 + $num02;
                       break; 

                    case "substract":
                       $value = $num01 - $num02;
                       break; 

                    case "multiply":
                        $value = $num01 * $num02;
                        break; 
                
                    case "divide":
                        $value = $num01 / $num02;
                        break; 
                    
                    default:
                        echo "<p>Something went wrong</p>";

                }
                echo "<p>Result = ". $value ."</p>";
            }
        }

    ?>
    
</body>
</html>