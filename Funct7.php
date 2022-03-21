<?php

header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "our Clinic 2";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT `Available_Day`, `Available_Time` , `Maximum_Appointment_Capacity` FROM `doctor_availability` WHERE Doctor_id = 1011 ORDER By Available_Day";
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