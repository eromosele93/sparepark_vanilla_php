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

else{   
    
}  
 // getting the driverID using sessions   
$ID = $_SESSION['$cID'];

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
            <div><a href="home.html"><img alt="SparePark logo" style ="width:280px; height:50px" src="images/logo.png"></a>
             </div>
   
            <div><a style="font-family: PT Serif, serif;" class="navlink" href="products.html"><i class="fa-solid fa-network-wired"></i>Products</a></div>
            <div><a style="font-family: PT Serif, serif;" class="navlink" href="about.html"><i class="fa-solid fa-building"></i> About us</a></div>
            <div><a style="font-family: PT Serif, serif;" class="navlink" href="logout.php"><i class="fa-solid fa-sign-out"></i> Sign out</a></div>
            <div><a style="font-family: PT Serif, serif;" class="navlink" href="users.php"><i class="fa-solid fa-user"></i> <?php echo $_SESSION["firstName"]. " ". $_SESSION["lastName"]; ?></a></div>
            
            
            
            
        </div>
        <div style="height:350px">
        <div style="text-align:center; text-decoration:underline; color:  #46E14E;">
        
            <h4>Your Last 10 bookings</h4>
        </div>
            
        <div style="text-align:center; text-decoration:none;  line-height: 35px;"><?php 
           // retirving the drivers booking from the booking table using the driver ID
            $sql = "select * from booking where driverID = $ID limit 10";
 $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
             if (mysqli_num_rows($result) > 0){
                 while($row = mysqli_fetch_assoc($result)){                
                     
        echo "Booking ID: " . $row["bookingID"].   "- " . $row["spaceaddress"]. "- " . $row["spacepostcode"]. "- ". $row["spaceType"]. "- ". $row["date"]. "- ". $row["time"]. "- £". $row["amount"]. "<br>";   
                     }}
            ?>
 <div style="margin-top: 20px"><button style = " border-radius: 5px; background-color: #46E14E; border: 1px solid  #46E14E; padding: 7px"><a style="color:white; text-decoration:none;" href="users.php"><i class="fa-solid fa-arrow-left"></i>Back</a></button></div>
        </div>
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