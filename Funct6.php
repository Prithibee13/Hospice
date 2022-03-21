<?php 
header('Content-Type: application/json');
$requst = file_get_contents("php://input");

$obj = json_decode($requst);


$date = $obj -> Date;
$time = $obj -> Time;
$doctor_id = $obj -> Doctor_id;
$capacity = $obj -> Capacity;

var_dump($date);
var_dump($time);
var_dump($doctor_id);


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "our Clinic 2";


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO doctor_availability (Available_Day , Available_Time, Doctor_id , Maximum_Appointment_Capacity) VALUES ('$date','$time','$doctor_id', '$capacity');";


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