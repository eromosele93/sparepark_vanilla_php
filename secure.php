<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "sparepark";
$conn = mysqli_connect($server, $username, $password, $db);
if (!$conn){
    
    die("Connection failed:" .mysqli_connect_error());
    
}
// Getting the value of the email address entered by the user on the form field
$email = $_POST['email'];

// Getting the value of the password entered by the user on the form field
$password = $_POST['password'];
// getting the admin email and password
$sql1 = "select * from admin";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
$aemail = $row1['email'];
$apassword = $row1['password'];
// For admin login
if($email == $aemail && $password == $apassword){
   header("location: admin.php");  
    
}
// for normal users
else{
// Retriveing and checking if the password and email entered by the user is on the useraccount table
$sql = "select * from useraccount where email = '$email' and password = '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
 
if($count == 1){
   $cID = $row['customerID'];
    session_start();
    
    $_SESSION["loggedin"] = true;
    $_SESSION["email"] = $email;
    $_SESSION["customerID"] = $cID;
   
   // Directing the user to his user profile after successsfull login
    header ("location: users.php");
        
}
else{
    header ("location: loginerror.html");
     
}

}

?>