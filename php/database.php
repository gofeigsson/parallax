<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Database</title>
<!--Google fonts link to Roboto-->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
<!--bootstrap CSS-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!--internal css stylesheet-->
<style>
body {
  font-family: 'Roboto', sans-serif;
  scroll-behavior: smooth;
}
table, th, td {
  border: 1px solid;
  padding: 5px;
  margin-top: 25px;
  vertical-align: top;
}
h5 {
  font-weight: 300;
}
h6 {
  color: green;
}
</style>
</head>
<body>
<!--bootstrap container-->  
<div class="container-fluid">
<!--welcome text / session name displayed / header-->
<div class="row justify-content-center m-2">
  <div class="col-md-8 text-left" id="top">
    <h5><?php echo "Hello, " .$_SESSION["username"];?></h5>
  <a href="endsession.php" class="btn btn-danger mt-3 mb-3">Log Out</a>
<h5>Please Select Database</h5>
  <a class="btn btn-primary mt-3 mb-3" href="#members" role="button">Art Club Members</a>  
  <a class="btn btn-primary mt-3 mb-3" href="#events" role="button">Events</a> 
  <a class="btn btn-primary mt-3 mb-3" href="#opex" role="button">Exhibition</a> 
</div>
</div>
<!--table for club members-->
<div class="row justify-content-center m-2">
<div class="col-md-8 text-left" id="members">
<h6>TABLE 1: All Registred Users Kids Art Club</h6>      
<table><th>Id</th><th>Firstname</th><th>Lastname</th><th>Email</th><th>Address</th><th>Postcode</th><th>City</th>
<th>DELETE</th><th>UPDATE</th>
<?php
  require('../includes/dbconx.php');
  if($stmt = $conn->prepare("SELECT id, firstname, lastname, email, address, postcode,
  city FROM newsletter")) {
  $stmt->bind_result($id, $firstname, $lastname, $email, $address, $postcode, $city);
  $stmt->execute();
  while ($stmt->fetch()) {
  echo "<tr><td>" . $id . "</td><td>" . $firstname . "</td><td>" . $lastname . "</td><td>" . $email."</td><td>" . $address . "</td><td>" . $postcode . "</td><td>" . $city . "</td><td><a href='delete.php?id=" . $id . "'>Delete</a></td><td><a href='edit.php?id=" . $id . "'>Update</a></td></tr>";
  }
$stmt->close();
}
else {echo "No data returned";}
?>
</table>
<br>
</div>
</div>
<!--teble for events-->
<div class="row justify-content-center m-2">
<div class="col-md-8 text-left" id="events">
<h6>TABLE 2: Event Listings Kids Art Club</h6>      
<table><th>Id</th><th>Category</th><th>Title</th><th>Date</th><th>Price</th><th>Photo</th><th>About</th>
<th>DELETE</th><th>UPDATE</th>
<?php
  require('../includes/dbconx.php');
  if($stmt = $conn->prepare("SELECT id, category, title, date, price, photo,
  about FROM whatson")) {
  $stmt->bind_result($id, $category, $title, $date, $price, $photo, $about);
  $stmt->execute();
  while ($stmt->fetch()) {
  echo "<tr><td>" . $id . "</td><td>" . $category . "</td><td>" . $title . "</td><td>" . $date . "</td><td>" . $price . "</td><td>" . $photo . "</td><td>" . $about . "</td><td>Delete</td><td>Update</td></tr>";
  }
$stmt->close();
}
else {echo "No data returned";}
?>
</table>
<br>
</div>
</div>
<!--table for exhibition-->
<div class="row justify-content-center m-2">
<div class="col-md-8 text-left" id="opex">
<h6>TABLE 3: Artist Info Opening Exhibition</h6>     
<table><th>Id</th><th>Name</th><th>About</th><th>Img1</th><th>Img2</th><th>Date of Birth</th>
<th>DELETE</th><th>UPDATE</th>
<?php
  require('../includes/dbconx.php');
  if($stmt = $conn->prepare("SELECT id, name, about, img1, img2, dob FROM artists")) {
  $stmt->bind_result($id, $name, $about, $img1, $img2, $dob);
  $stmt->execute();
  while ($stmt->fetch()) {
  echo "<tr><td>" . $id . "</td><td>" . $name . "</td><td>" . $about . "</td><td>" . $img1 . "</td><td>" . $img2 . "</td><td>" . $dob . "</td><td>Delete</td><td>Update</td></tr>";
  }
$stmt->close();
}
else {echo "No data returned";}
?>
</table>
<br>
<a class="btn btn-success mt-3 mb-3" href="#top" role="button">Back To Top</a> 
</div>
</div>
<!--container ends-->
</div>
<!--bootstrap-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>