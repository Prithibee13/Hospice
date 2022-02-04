<?php 

header('Content-Type: application/json');
$requst = file_get_contents("php://input");


$obj = json_decode($requst);

$Name = $obj -> Name;
$Age = $obj -> Age;
$Mobile = $obj -> Mobile;
$Gender = $obj -> Gender;
$Doctor_id = $obj -> Doctor_id;
$Date = $obj -> Date;



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "our Clinic";


// Create connection


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `patients_detailes` (Name,Age,Mobile_Number,Gender,Doctor_id,Visiting_Date) VALUES ('$Name','$Age','$Mobile','$Gender','$Doctor_id', '$Date');";

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