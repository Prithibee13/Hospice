<?php 

header('Content-Type: application/json');
$requst = file_get_contents("php://input");


$obj = json_decode($requst);

$name = $obj -> Name;
$age = $obj -> Age;
$mobile = $obj -> Mobile;
$gender = $obj -> Gender;
$doctor_id = $obj -> Doctor_id;
$date = $obj -> Date;
$patient_id = $obj -> Patient_id;
$appointment_id = $obj -> appointment_id;


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "our Clinic 2";


// Create connection


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql1 = "INSERT IGNORE INTO patients (Patient_ID , Patient_Name , Patient_Phone , Patient_Age , Patient_Sex) VALUES ('$patient_id', '$name','$mobile','$age','$gender');";
$sql2 = "INSERT IGNORE INTO appointments (Appointment_ID , Appointment_Date , Patient_ID , Doctor_id) VALUES ('$appointment_id' , '$date' , '$patient_id' , '$doctor_id');";

if($conn -> query($sql1) === TRUE)
{
  echo "Successfully Inserted"; 
}

else
{
  echo "Not Inserted";
}

if($conn -> query($sql2) === TRUE)
{
  echo "Successfully Inserted";
}
else
{
  echo "Not Inserted";
}




$conn->close();
?>

<!--  -->
<!--  -->