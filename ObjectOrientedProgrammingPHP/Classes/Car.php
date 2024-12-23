<?php 

class Car{
    // properties/fields
    private $brand;
    private $color;
    public $vehicleType = "car";

    // constructor 
    public function __construct($brand , $color = "none"){
        $this->brand = $brand;
        $this->color = $color;
    }

    // getters and setters methods for accessing the private properties in a class

    // the brand property
    // get the value
    public function getBrand(){
        return $this->brand;
    }

    // set to a new value, set the parameter in the method to enable
    public function setBrand($brand){
        $this->brand = $brand;
    }


    // the color property
     // get the value
     public function getColor(){
        return $this->color;
    }

    // set to a new value, set the parameter in the method to enable
    public function setColor($color){
        // you can set the allowed colors in the array
        $allowedColors = [
            "red",
            "blue",
            "green",
            "yellow"
        ];
        // run the condition toset the colors
        if(in_array($color, $allowedColors)){
            //as long as the color exists in the array
            $this->color = $color;
        }

        
    }


    // creating own method
    public function getCarInfo(){
        // return "Brand: " . $brand . ", Color: ". $color;
        return "Brand: " . $this->brand  . ", Color: ". $this->color;


    }
}









// now remove the car object from the this same file
// creating an object for the car class
// $car01 = new Car("Volvo", "green");
// $car02 = new Car("BMW", "blue");
// $car03 = new Car("Toyota");

// echo $car01->getCarInfo();
// echo "<br>";
// echo$car01->vehicleType;


