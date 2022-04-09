<?php

header('Content-Type: application/json');
$requst = file_get_contents("php://input");

$obj = json_decode($requst);

$id = $obj -> id;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "our Clinic 2";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "
    SELECT t1.* , t2.Appointment_Date , t3.Doctor_Name ,t4.Available_Time,t5.Department_Name FROM patient as t1 JOIN appointments as t2 on t1.Patient_ID = t2.Patient_ID JOIN doctors as t3 on t2.Doctor_id = t3.Doctor_id JOIN doctor_availabilities as t4 ON t3.Doctor_id = t4.Doctor_id AND t2.Appointment_Date = t4.Available_Day Join departments as t5 on t3.Department_ID = t5.Department_ID WHERE t1.Patient_ID ='$id'";
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
?>