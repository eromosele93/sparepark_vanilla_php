<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$db = "sparepark";
// database connection
$conn = mysqli_connect($server, $username, $password, $db);
if (!$conn){
    
    die("Connection failed:" .mysqli_connect_error());
    
}
// getting the postcode value from the form field
$code = $_POST['scode'];
// fetching data from the spaceowner table with the postcode
$sql = "select * from spaceowner where postcode = '$code' ";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
 if ($count > 0){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
     
   
      $_SESSION["postcode"] = $row['postcode'];
     
   
   
       // directing the user to the search result page
         header ("location: result.php");
     }
     
     
 
else{
   
}

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
    
    <body onload="updateTime();">
        <div class="head-container">
            <div><a href="home.html"><img alt="SparePark logo" style ="width:280px; height:50px" src="images/logo.png"></a>
             </div>
    <div><a style="font-family: PT Serif, serif;" class="navlink" href="products.html"><i class="fa-solid fa-network-wired"></i>Products</a></div> 
            <div><a style="font-family: PT Serif, serif;" class="navlink" href="about.html"><i class="fa-solid fa-building"></i> About us</a></div>
            <div><a style="font-family: PT Serif, serif" class="navlink" href="signin.html"><i class="fa-solid fa-right-to-bracket"></i> Login</a></div>
            <div><a style="font-family: PT Serif, serif"  class="navlink" href="register.php"><i class="fa-solid fa-user"></i> Sign up</a></div>
            <div><a class="navlinkrent" href="">Rent out your space</a></div>
</div>
      <div style="width 100%; height: 500px">
          <h4> No result found: It is either no parking space has been listed under that postcode or the postcode is invalid </h4>
          <button style=" background-color:#46E14E; border: 1px solid #46E14E" ><a  href = "home.html" style="text-decoration:none; color:white"> Go back</a></button>
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
        
        
        
        