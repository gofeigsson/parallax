<?php
require('../includes/dbconx.php');
if(isset($_POST['submit'])){
if(!empty($_POST['firstname'] || $_POST['lastname'] || $_POST['email'] || $_POST['address'] || $_POST['postcode'] || $_POST['city']))  {
$stmt = $conn->prepare("INSERT INTO newsletter (firstname, lastname, email, address, postcode, city) VALUES (?,?,?,?,?,?)");
$stmt->bind_param("ssssss", $firstname, $lastname, $email, $address, $postcode, $city); 
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
$city = mysqli_real_escape_string($conn, $_POST['city']);
$stmt->execute(); 
header("location: ../thanks.html");
$conn->close();
}
else{
die('Sorry-this didnt quite work out!! try again later...'); 
}
}
?>