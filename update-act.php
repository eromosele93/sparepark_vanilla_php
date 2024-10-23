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
$email = $_POST["email"];
$fName = $_POST["fName"];
$lName = $_POST["lName"];
$cID = $_POST["cID"];
//update query
  $sql = "UPDATE useraccount SET email='$email', firstName = '$fName', lastName = '$lName' WHERE customerID = $cID";
if (!mysqli_query($conn, $sql)){
    
    die('Error in query:' . mysqli_error());

}
else{
    
    
    
}  

?>
<html>
    <meta charset="utf-8">
    <body onload="myFunction()">
     <script>
function myFunction() {
  alert("Record updated successfully");
}
</script>
        
        

    </body>
</html>