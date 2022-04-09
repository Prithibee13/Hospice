<?php 

header('Content-Type: application/json');
$requst = file_get_contents("php://input");


$obj = json_decode($requst);

$p_id = $obj -> p_id;
$doc_id = $obj -> doc_id;
$date = $obj -> date;
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

$sql2 = "INSERT INTO appointments (Appointment_ID , Appointment_Date , Patient_ID , Doctor_id) VALUES ('$appointment_id' , '$date' , '$p_id' , '$doc_id');";

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
<!--  -->