<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
      //procedural php
        $brand = "Volvo";
        $color = "Green";

        function getCarInfo($brand, $color){
            return "Brand: " . $brand . ", Color: ". $color;
        }
    
        echo getCarInfo($brand, $color);
    ?>



        <br>



    <?php 
    // object oriented php programming
    // loading the object from the created car class
        // granting first the access to the class, which is a car class,showing the path to take the file 
        require_once "Classes/Car.php"; 
    

        // instatiating the new car object from the car class
        $car01 = new Car("BMW second", "Green second");
        echo $car01->vehicleType;
        echo $car01->getCarInfo();
        //setter
        echo $car01->setBrand("volcoooloco");

        // getter
        echo $car01->getBrand();

        echo $car01->setColor("blue");
        echo $car01->getColor();

    ?>
</body>
</html>