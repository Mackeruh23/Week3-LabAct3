<?php
// Base Vehicle class
class Vehicle {
    protected $make;
    protected $model;
    protected $year;

    public function __construct($make, $model, $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    // Final method to prevent further modification in subclasses
    final public function getDetails() {
        return "Make: $this->make, Model: $this->model, Year: $this->year";
    }

    // Method to be overridden in derived classes
    public function describe() {
        return "This is a vehicle.";
    }
}

// Car class extending Vehicle
class Car extends Vehicle {
    private $numDoors;

    public function __construct($make, $model, $year, $numDoors) {
        parent::__construct($make, $model, $year);
        $this->numDoors = $numDoors;
    }

    public function describe() {
        return "This is a car with $this->numDoors doors.";
    }
}

// Final Motorcycle class to prevent further subclassing
final class Motorcycle extends Vehicle {
    public function describe() {
        return "This is a motorcycle.";
    }
}

// ElectricVehicle interface
interface ElectricVehicle {
    public function chargeBattery();
}

// ElectricCar class extending Car and implementing ElectricVehicle
class ElectricCar extends Car implements ElectricVehicle {
    private $batteryLevel;

    public function __construct($make, $model, $year, $numDoors, $batteryLevel = 100) {
        parent::__construct($make, $model, $year, $numDoors);
        $this->batteryLevel = $batteryLevel;
    }

    public function describe() {
        $electricCar = new ElectricCar("Tesla", "Model S", 2023, 4);

    }

    public function chargeBattery() {
        $this->batteryLevel = 100;
        return "Battery fully charged.";
    }
}

// Test the implementation

// Creating a Car object
$car = new Car("Toyota", "Corolla", 2022, 4);
echo $car->getDetails() . "<br>"; // Output: Make: Toyota, Model: Corolla, Year: 2022
echo $car->describe() . "<br><br>";   // Output: This is a car with 4 doors.

// Creating a Motorcycle object
$motorcycle = new Motorcycle("Harley-Davidson", "Street 750", 2021);
echo $motorcycle->getDetails() . "<br>"; // Output: Make: Harley-Davidson, Model: Street 750, Year: 2021
echo $motorcycle->describe() . "<br><br>";   // Output: This is a motorcycle.

// Creating an ElectricCar object
$electricCar = new ElectricCar("Tesla", "Model S", 2023, 4);
echo $electricCar->getDetails() . "<br>"; // Output: Make: Tesla, Model: Model S, Year: 2023
echo $electricCar->describe() . "<br>";   // Output: This is an electric car with 4 doors.
echo $electricCar->chargeBattery() . "<br>"; // Output: Battery fully charged.

?>
