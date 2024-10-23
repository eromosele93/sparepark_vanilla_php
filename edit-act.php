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
$ID = $_POST["id"];
$hours = $_POST["hours"];
$date = $_POST["date"];
$time = $_POST["time"];
// geting the driver Id from the booking table
 $sql = "select driverID from booking where bookingID = '$ID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$driverID = $row['driverID'];
// Making sure that the Booking beeing editted was made by the driver
if($_SESSION['$cID'] == $driverID){
  $sql1 = "UPDATE booking SET hours='$hours', date = '$date', time = '$time' WHERE bookingID = $ID";

if (!mysqli_query($conn, $sql1)){
    
    die('Error in query:' . mysqli_error());

}
else{   
}  
    
}else{
    
    header ("location: error.html");
}
// getting the details of the booking

$sql3 = "select * from booking where bookingID = '$ID'";
$result3 = mysqli_query($conn, $sql3);
$row = mysqli_fetch_array($result3, MYSQLI_ASSOC);
$bookingID = $row['bookingID'];
$email = $row['owneremail'];
$postcode = $row['spacepostcode'];
$phone = $row['ownerphone'];
$spaceType = $row['spaceType'];
$d = $row['date'];
$h = $row['hours'];
$t = $row['time'];
$address = $row['spaceaddress'];
mysqli_close($conn);
    ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="images/logo.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alkatra&family=PT+Serif&family=Quicksand:wght@300&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/85664424c0.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">
        <link rel="stylesheet" href="css/main.css" >
        <title>
            SparePark
        </title>
    </head>
    
    <body >
        <div class="head-container">
            <div><a href="home.html"><img style ="width:280px; height:50px" src="images/logo.png"></a>
             </div>
    
            <div><a style="font-family: PT Serif, serif;" class="navlink" href="products.html"><i class="fa-solid fa-network-wired"></i>Products</a></div>
            <div><a style="font-family: PT Serif, serif;" class="navlink" href="about.html"><i class="fa-solid fa-building"></i> About us</a></div>
            <div><a style="font-family: PT Serif, serif;" class="navlink" href="logout.php"><i class="fa-solid fa-sign-out"></i> Sign out</a></div>
            <div><a style="font-family: PT Serif, serif;" class="navlink" href="users.php"><i class="fa-solid fa-user"></i> <?php echo $_SESSION["firstName"]. " ". $_SESSION["lastName"]; ?></a></div>
            
            
            
            
        </div>
        <div style="text-align: center; color: #46E14E"><h4><?php echo "Dear ". $_SESSION["firstName"]. " your booking has been updated. Below are the details" ?></h4></div>
       
         <div style="Height: 300px; margin-top: 20px; margin-left: 10px"><?php
  echo "Booking ID: " . $bookingID.   ",  Address: " . $address. ", Postcode: " . $postcode. ", Space Type: ". $spaceType. ", Date:". $d . ", Time: " . $t . " Hours: ". $h. "<br>"; ?>
            <div style="margin-top: 10px"><u>Space Owner contact details</u></div>
           <?php echo "Phone: " . $phone.   ",  Email: " . $email.  "<br>"; ?>
             
             <div style="margin-top: 20px"><button style = " border-radius: 5px; background-color: #46E14E; border: 1px solid  #46E14E"><a style="color:white; text-decoration:none;" href="users.php"><i class="fa-solid fa-arrow-left"></i>Back</a></button></div>
        </div>
        
      <div class="privacy">
            <div>
                
                
                <p style="color: white"> Social Media</p>
            
                    <img src="images/tw.png" style="width: 30px; height: 30px">
                    <img src="images/lk.png" style="width: 30px; height: 30px">
                    <img src="images/fb.png" style="width: 30px; height: 30px">
            
               
            </div>
            <div> 
                    <a class="p" href="privacy.html">Privacy Policy</a>
                    <a class ="p" href="terms.html">Terms and conditions</a>
                <a class="p" href="contact.html">Contact us</a>
                <div style="text-align: center"><img style="width: 250px; height: 50px" src="images/3logo.png"></div>
                
            </div>
            <div>
                <a href=""> <img  src="images/google.png" style="width: 150px; height: 50px"></a>
            </div>
        </div>
    </body>
</html>