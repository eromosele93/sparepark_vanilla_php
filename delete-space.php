<?php
  session_start();
$server = "localhost";
$username = "root";
$password = "";
$db = "sparepark";
$conn = mysqli_connect($server, $username, $password, $db);
if (!$conn){
    
    die("Connection failed:" .mysqli_connect_error());
    
}  
$spaceID = $_POST["space"];
 
$sql1 = "delete from spaceowner where ownerID = '$spaceID'";
if ($conn->query($sql1) === TRUE) {

} else {

}

?>
<html>
    <body onload="myFunction()">
     <script>
function myFunction() {
  alert("Record deleted successfully");
}
</script>
        