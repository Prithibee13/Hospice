<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "our clinic 2";

// Create connection


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Do.Doctor_Name , DE.Department_Name , Do.Doctor_id FROM doctor AS Do JOIN department AS DE Where Do.Department_ID = DE.Department_ID";
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