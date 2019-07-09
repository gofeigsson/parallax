<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('../includes/dbconx.php');
if(isset($_POST['submit'])){
$recordID = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

$email = $_POST['email'];
$address = $_POST['address'];
$postcode = $_POST['postcode'];
$city = $_POST['city'];



$stmt = $conn->prepare("UPDATE newsletter SET firstname=?,
lastname=?, email=?, address=?, postcode=?, city=? WHERE id=?");
$stmt->bind_param("ssssssi", $firstname, $lastname, $email, $address, $postcode, $city, $recordID);
$stmt->execute();
$stmt->close();
$conn->close();//close connection
header( 'Location: database.php' ) ;
}
?> 