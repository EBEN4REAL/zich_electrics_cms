<?php
 $name = "SomeName";
  $value = 100;
  $expiration = time() + (60 * 60 * 24 * 7);
 setcookie($name , $value, $expiration);


 class Car {

 	public static  $wheels   = 1;
 	protected $tyre = 4;
 	private $doors = 4;
 	public static $windows = 40;

 	  function  MoveWheels(){
 	  Car::$ wheels = "Wheels are moving already";
 }

  function OpenDoors(){
 	echo "There are " . $this->doors . "in a car";
 }
 function showProperty(){
 	 $this->$windows = 80;
 }

 function __construct(){
 	echo $this->doors = 150;
 }

 }

class Semi extends Car{
  function showProperty(){
  	echo $this->doors;
  }
}
 
 $cherokee = new Car();

 echo "<br>";

 $semi = new Semi();

 echo "<br>";
 echo Car::$windows;

echo Car::MoveWheels();


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 
 
 </body>
 </html>