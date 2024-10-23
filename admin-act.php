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

$pinform = $_POST['pin'];

$sql = "select pin from admin";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$pin = $row['pin'];

if($pinform == $pin){
     session_start();
    
    $_SESSION["loggedin"] = true;
   header ("location: admin-dashboard.php"); 
    
}else{
  header ("location: loginerror.html");   
}


?>
