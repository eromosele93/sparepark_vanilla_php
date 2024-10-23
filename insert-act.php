

<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$db = "sparepark";
$conn = mysqli_connect($server, $username, $password, $db);


$postcode = $_POST['postcode'];

$sql = "insert into postcode (postcode, cityID) values('$postcode', '1')"; 
if (!mysqli_query($conn, $sql)){
    
    die('Error in query:' . mysqli_error());

}
else{
    
       
}

   
  

?>
<html>
    <body onload="myFunction()">
     <script>
function myFunction() {
  alert("Record added successfully");
}
</script>
        
        

    </body>
</html>