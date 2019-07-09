<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Parallax</title>
<!--external Bootstrap link for CSS-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!--Google fonts link to Roboto-->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
<!--CSS stylesheet -->    
<link rel="stylesheet" type="text/css" href="../css/exhibit.css">   
<!--CSS for typography-->
<link rel="stylesheet" type="text/css" href="../css/typography.css">  
<!--scroll function, called through php-->
<script>
function myFunction() {
  var elmnt = document.getElementById("two");
  elmnt.scrollIntoView();
}
</script>
</head>
<body>
<!--wrapper for all content-->
<div id="wrapper">
<!--main content-->
<div id="one">
<!--buttons-->
<div class="btn-group-vertical"> 
    <form method="post"><input type="hidden" name="search" value="Alexandr Rodchenko">
    <button class="btn btn-outline-danger m-1" name="submit">Alexandr Rodchenko</button></form>
    <form method="post"><input type="hidden" name="search" value="El Lissitzky">
    <button class="btn btn-outline-danger m-1" name="submit">El Lissitzky</button></form>
    <form method="post"><input type="hidden" name="search" value="Nagy">
    <button class="btn btn-outline-danger m-1" name="submit">Laszlo Moholy-Nagy</button></form>
    <form method="post"><input type="hidden" name="search" value="Man Ray">
    <button class="btn btn-outline-danger m-1" name="submit">Man Ray</button></form>
    <form method="post"><input type="hidden" name="search" value="Anton Giulio Bragaglia">
    <button class="btn btn-outline-danger m-1" name="submit">Anton Giulio Bragaglia</button></form>
    <form method="post"><input type="hidden" name="search" value="Harry Callahan">
    <button class="btn btn-outline-danger m-1" name="submit">Harry Callahan</button></form>
    <form method="post"><input type="hidden" name="search" value="Heinz Hajek-Halke">
    <button class="btn btn-outline-danger m-1" name="submit">Heinz Hajek-Halke</button></form>
</div>
<!--div one ends-->
</div>
<!--php database query-->
<?php
require('../includes/dbconx.php');
if(isset($_POST['submit'])){
if(!empty($_POST['search'])) {
$search = mysqli_real_escape_string($conn, $_POST['search']);
$sql= "SELECT * FROM artists WHERE name LIKE '%" .$search. "%' ORDER BY name ASC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
echo '<div id="two"><h1>' . $row["name"] . '</h1></div>';
echo '<div id="three" style=' . '"' . 'background-image: url(' . $row["img1"] . ');
background-size: cover; background-attachment: fixed;' . '"' . '>' . '</div>';
echo '<div id="four"><h4>' . $row["about"] . '</h4></div>';
echo '<div id="five" style=' . '"' . 'background-image: url(' . $row["img2"] . ');
background-size: cover; background-attachment: fixed;' . '"' . '>' . '</div>';
echo '<div id="six"><h2>'
. $row["name"] . '</h2><br>' . '<h3>' . $row["dob"] . '</h3><br>' .
'<div class="btn-group"> 
    <form method="post"><input type="hidden" name="search" value="Alexandr Rodchenko">
    <button class="btn btn-outline-danger m-1" name="submit">Alexandr Rodchenko</button></form>
    <form method="post"><input type="hidden" name="search" value="El Lissitzky">
    <button class="btn btn-outline-danger m-1" name="submit">El Lissitzky</button></form>
    <form method="post"><input type="hidden" name="search" value="Nagy">
    <button class="btn btn-outline-danger m-1" name="submit">Laszlo Moholy-Nagy</button></form>
    <form method="post"><input type="hidden" name="search" value="Man Ray">
    <button class="btn btn-outline-danger m-1" name="submit">Man Ray</button></form>
    <form method="post"><input type="hidden" name="search" value="Anton Giulio Bragaglia">
    <button class="btn btn-outline-danger m-1" name="submit">Anton Giulio Bragaglia</button></form>
    <form method="post"><input type="hidden" name="search" value="Harry Callahan">
    <button class="btn btn-outline-danger m-1" name="submit">Harry Callahan</button></form>
    <form method="post"><input type="hidden" name="search" value="Heinz Hajek-Halke">
    <button class="btn btn-outline-danger m-1" name="submit">Heinz Hajek-Halke</button></form>
</div>
</div>';
echo "<script>myFunction();</script>";
}} 
else {echo "unfortunately this content is unavailable at the moment";}
$conn->close();}
?>
<!--wrapper ends-->
</div> 
<!--external Bootstrap links-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--javascript file-->
<script src="../javascript/exhibit.js"></script>
</body>
</html>