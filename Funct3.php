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

$sql1 = "INSERT INTO patient (Patient_ID , Patient_Name , Patient_Phone , Patient_Age , Patient_Sex) VALUES ('$patient_id', '$name','$mobile','$age','$gender');";
$sql2 = "INSERT INTO appointment (Appointment_ID , Appointment_Date , Patient_ID , Doctor_id) VALUES ('$appointment_id' , '$date' , '$patient_id' , '$doctor_id');";

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

<!-- 
SELECT t1.* , t2.Appointment_Date , t3.Doctor_Name ,t4.Available_Time
FROM patient as t1
JOIN appointment as t2 on t1.Patient_ID = t2.Patient_ID
JOIN doctor as t3 on t2.Doctor_id = t3.Doctor_id
JOIN doctor_availability as t4 ON t3.Doctor_id = t4.Doctor_id AND t2.Appointment_Date = t4.Available_Day; -->

