<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
<!--Google fonts link to Roboto-->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
<!--bootstrap CSS-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!--internal css stylesheet-->
<style>
body {
  font-family: 'Roboto', sans-serif;
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
<!--session name displayed and log out button-->
<div class="row justify-content-center mb-5 mt-5">
  <div class="col-md-8 text-left">
    <h5><?php echo "Hello, " .$_SESSION["username"];?></h5>
  <a href="endsession.php" class="btn btn-danger mb-3 mt-3">Log Out</a>
</div>
</div>
<!--edit section-->
<div class="row justify-content-center">
<div class="col-md-8 text-left">
<!--records retrieved from database-->
<?php
require('../includes/dbconx.php');
$id = $_GET['id'];
    $search = mysqli_real_escape_string($conn, $_GET['id']);
    $sql= "SELECT * FROM newsletter WHERE id LIKE '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
    while($row = $result->fetch_assoc()) 
    {
    $firstnameEdit = $row["firstname"];
    $lastnameEdit = $row["lastname"];
    $emailEdit = $row["email"];
    $addressEdit = $row["address"];
    $postcodeEdit = $row["postcode"]; 
    $cityEdit = $row["city"]; 
      }
      } 
      else 
      {
      echo "no results";
      }
      $conn->close();
?>
</div>
</div>
<!--records presented-->
<div class="row justify-content-center">
    <div class="col-md-8">
    <h6>EDIT RECORDS</h6><br>
    <form action="update.php" method="post" name="Update">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <div class="form-group m-5">
    <label for="firstname">Firstname</label>
    <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $firstnameEdit;?>"></div>
    <div class="form-group m-5">
    <label for="lastname">Lastname</label>
    <input type="text" class="form-control" name="lastname" id="lasname" value="<?php echo $lastnameEdit;?>"></div>
    <div class="form-group m-5">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email" id="email" value="<?php echo $emailEdit;?>"></div>
    <div class="form-group m-5">
    <label for="address">Address</label>
    <input type="text" class="form-control" name="address" id="address" value="<?php echo $addressEdit;?>"></div>
    <div class="form-group m-5">
    <label for="postcode">Postcode</label>
    <input type="text" class="form-control" name="postcode" id="postcode" value="<?php echo $postcodeEdit;?>"></div>
    <div class="form-group m-5">
    <label for="city">City</label>
    <input type="text" class="form-control" name="city" id="city" value="<?php echo $cityEdit;?>"></div>
    <br>
    <input type="submit" class="btn btn-success mb-5" name="submit" value="Update">
    <a href="database.php"><input type="button" class="btn btn-danger mb-5" name="cancel" value="Cancel"><a>
    </form>
</div>
</div>
<!--container ends-->
</div>
</body>
<!--Bootstrap-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>