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

$pcode = $_SESSION["postcode"];


$sql = "select * from spaceowner where postcode = '$pcode'";
$result = mysqli_query($conn, $sql);
 $count = mysqli_num_rows($result);
 
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
            <div><a style="font-family: PT Serif, serif" class="navlink" href="signin.html"><i class="fa-solid fa-right-to-bracket"></i> Login</a></div>
            <div><a style="font-family: PT Serif, serif"  class="navlink" href="register.php"><i class="fa-solid fa-user"></i> Sign up</a></div>
            <div><a class="navlinkrent" href="">Rent out your space</a></div>
</div>
    
<div style="margin-top: 50px; margin-left:50px; height: 350px">
    <div style = "margin-bottom: 30px"><?php echo $count. " result(s) came out from your search" ?></div>
    <div style="margin-bottom:5px; color: darkred">*The hourly rate for all spaces is 2pounds.</div>
    <table>
        
        <tr>
        <?php   
            while($row = mysqli_fetch_assoc($result)){
                echo "Space ID: " . $row["ownerID"].   ",  Address: " . $row["address"]. ", Postcode " . $row["postcode"]. ", Space Type: ". $row["spaceType"]. "<br>";
                
            }
            ?>
        
        </tr>
    </table>
     <div style="margin-top: 10px; margin-botto,:10px">Only registered and logged in users can book space</div>
    <button style="background-color: #46E14E; border: 1px solid  #46E14E"><a style="text-decoration:none; color:white" href="register.php">Register</a></button>
    <button style="background-color: #46E14E; border: 1px solid  #46E14E"><a style="text-decoration:none; color:white" href="signin.html">Login</a></button>
   
   
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