<?php

header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "our clinic 2";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT doctors.Doctor_Name FROM departments JOIN doctors ON departments.Department_ID = doctors.Department_ID WHERE departments.Department_Name='Medicine'";
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