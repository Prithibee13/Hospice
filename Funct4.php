<?php

header('Content-Type: application/json');

$requst = file_get_contents("php://input");


$obj = json_decode($requst);

$day = $obj -> available_Day;
$id = $obj -> id;

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

$sql = "SELECT t1.Patient_Name , t1.Patient_Phone , t1.Patient_Age , t1.Patient_Sex , t2.Appointment_Date ,t4.Available_Time as Time FROM patient as t1 JOIN appointment as t2 on t1.Patient_ID = t2.Patient_ID JOIN doctor as t3 on t2.Doctor_id = t3.Doctor_id JOIN doctor_availability as t4 ON t3.Doctor_id = t4.Doctor_id AND t2.Appointment_Date = t4.Available_Day WHERE t2.Doctor_id = '$id' AND t2.Appointment_Date = '$day';";
$result = $conn->query($sql);

$Datas = array();

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) 
  {
      $Datas[] = $row;
  }
}

echo json_encode($Datas);

$conn->close();

?>