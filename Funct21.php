<?php

header('Content-Type: application/json');


header('Content-Type: application/json');

$requst = file_get_contents("php://input");

$obj = json_decode($requst);

$id = $obj;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "our clinic 2";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT doctor.Doctor_Name FROM department JOIN doctor ON department.Department_ID = doctor.Department_ID WHERE department.Department_Name='Cardiology' AND doctor.Doctor_ID = '$id'";
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