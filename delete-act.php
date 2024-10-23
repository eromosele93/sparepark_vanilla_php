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
$postcode = $_POST["postcode"];

/*
$sql = "select * from useraccount where email = '$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$cID = $row['customerID']; 


$sql1 = "delete from useraccount where customerID = $cID";
if ($conn->query($sql1) === TRUE) {

} else {

}

$sql2 = "delete from spaceowner where customerID = $cID";
if ($conn->query($sql2) === TRUE) {

} else {

}

$sql3 = "delete from driver where customerID = $cID";
if ($conn->query($sql3) === TRUE) {

} else {
  
}
$sql4 = "delete from booking where customerID = $cID";
if ($conn->query($sql4) === TRUE) {

} else {
  
}

 */   
$sql1 = "delete from postcode where postcode = '$postcode'";
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
        