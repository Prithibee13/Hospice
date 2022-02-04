<?php 
header('Content-Type: application/json');
$requst = file_get_contents("php://input");

$obj = json_decode($requst);

$Date = $obj -> Date;
$Time = $obj -> Time;
$Doctor_id = $obj -> Doctor_id;




$servername = "localhost";
$username = "root";
$password = "";
$dbname = "our Clinic";


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO schedule (Doctor_id , Date, Time) VALUES ('$Doctor_id','$Date','$Time');";


if($conn -> query($sql) === TRUE)
{
  echo "Successfully Inserted";
}
else
{
  echo "Not Inserted";
}



$conn->close();





?>