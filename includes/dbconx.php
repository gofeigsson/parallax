<?php
//webhost
//$servername = "localhost";
//$username =  "ofeigsso_ofeigss";
//$password = "Gunnarsdottir17";
//$dbname = "ofeigsso_parallax";
//uniserver
$servername = "localhost";
$username =  "root";
$password = "root";
$dbname = "exhibition";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("connection failed " . $conn->connect_error); 
}
?>