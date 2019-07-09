<?php
session_start();
require('../includes/dbconx.php');
if(isset($_POST['submit'])){
if(!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $_SESSION["username"] = "$username";
    $sql= "SELECT * FROM administration WHERE username = '$username' AND  password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
        header('Location: database.php'); 
    } 
    else 
    {
        echo "<script>
        alert('Incorrect Details');
        window.location.href='kidsdatab.php';  
        </script>";
    }
    $conn->close();
}}
?>