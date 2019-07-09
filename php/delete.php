<?php     
if(isset($_GET['id'])){
include('../includes/dbconx.php');
$myID = $_GET['id'];
//echo $myID; // get variable value – for testing only
//echo "The data type is".gettype($myID); 
// get variable datatype – for testing only
$sql = "DELETE FROM newsletter WHERE id = ?";
$stmt = $conn->prepare($sql); // Prepare the SQL statementfor execution
$stmt->bind_param("s", $myID); //Binds variables to theprepared statement
$stmt->execute(); // Executes the prepared Query
header("Location: database.php");
}
else {
echo "Error deleting record: " . $conn->error;
}
?>