<?php
session_start();



if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    
    header ("location: signin.php");
        exit;
}


$server = "localhost";
$username = "root";
$password = "";
$db = "sparepark";

$conn = mysqli_connect($server, $username, $password, $db) or die ("Not connected");




?>
<html lang="en">
   
    <head>
         <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <body>
        <div class="head-container">
            <div><a href="home.html"><img alt="SparePark logo" style ="width:280px; height:50px" src="images/logo.png"></a>
             </div>
   
           <div><a style="font-family: PT Serif, serif;" class="navlink" href="products.html"><i class="fa-solid fa-network-wired"></i>Products</a></div>
            <div><a style="font-family: PT Serif, serif;" class="navlink" href="about.html"><i class="fa-solid fa-building"></i> About us</a></div>
            <div><a style="font-family: PT Serif, serif" class="navlink" href="logout.php"><i class="fa-solid fa-sign-out"></i> Sign out</a></div> 
            <div><a style="font-family: PT Serif, serif;" class="navlink" href="admin-dashboard.php"><i class="fa-solid fa-user"></i>System Administrator</a></div>
        </div>
        
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'Insert Request')" id="defaultOpen"><i class="fa-solid fa-plus"></i>Insert Request</button>
            <button class="tablinks" onclick="openCity(event, 'Update Request')"><i class="fa-solid fa-edit"></i>Update Request</button>
            <button  class="tablinks" onclick="openCity(event, 'Delete Request')"><i class="fa-solid fa-times"></i>Delete Request</button>
</div>

<div id="Insert Request" class="tabcontent" >
     <div style="text-align: center; margin-top: 50px; margin-bottom: 50px;  width: 550px; margin-left: auto; margin-right: auto; height:300px ">
        
         <form method="post" action="insert-act.php"> 
        <p>
        <label>Postcode:</label><br>
        <input style="border: 1px solid #46E14E;  border-radius:5px" type="text" required size = "50" name = "postcode">
        </p>
      
        <input type="submit" name="submit" value="insert" style="background-color: #46E14E; color: white; border-color: #46E14E; border-radius:5px">
        
        
       </form>
        </div>
        </div>
<div id="Update Request" class="tabcontent">
       <div style="text-align:center; text-decoration:underline; color:  #46E14E"><h3>Enter new customer details</h3></div>
        
         <div style="text-align: center; margin-top: 50px; margin-bottom: 100px;  width: 550px; margin-left: auto; margin-right: auto; height: 250px; border: 1px solid ; border-radius: 10px ">
           
   
        
    <form action="update-act.php" method="post" >
    <table style="margin-top: 10px">
      
         <tr> 
           <td style="padding: 10px"><label>Customer ID:</label></td>
           <td style="padding: 10px">   <input style="border: 1px solid #46E14E;  border-radius:5px" type="text" required size = "50" name = "cID"></td>
        </tr>
        <tr> 
           <td style="padding: 10px"><label>Email:</label></td>
           <td style="padding: 10px">   <input style="border: 1px solid #46E14E;  border-radius:5px" type="text" required size = "50" name = "email"></td>
        </tr>
          <tr> 
           <td style="padding: 10px"><label>First Name:</label></td>
       <td style="padding: 10px">     
           <input style="border: 1px solid #46E14E;  border-radius:5px" type="text" required size = "50" name = "fName">    
              </td>
        </tr>
     
        <tr> 
           <td style="padding: 10px"><label>Last Name:</label></td>
           <td style="padding: 10px">   <input style="border: 1px solid #46E14E;  border-radius:5px; width:368px" type="text" required  name = "lName"></td>
        </tr>
         
        <tr> 
          
           <td style="padding: 10px">   <input style="border: 1px solid #46E14E;  border-radius:5px; width:100px; background-color:#46E14E; color: white" type="submit" required  name = "Update"></td>
           
        </tr>
        </table> 
        
       </form>
       
      

        </div>
    </div> 

<div id="Delete Request" class="tabcontent">

      
        
      <div class="admin">
     <div>
         <form method="post" action="delete-act.php"> 
               <h4>Delete Postcode</h4>
        <p>
        <label>Postcode:</label><br>
        <input style="border: 1px solid #46E14E;  border-radius:5px" type="text" required size = "50" name = "postcode">
        </p>
      
        <input type="submit" name="submit" value="Delete" style="background-color: #46E14E; color: white; border-color: #46E14E; border-radius:5px">
        
        
       </form>
      </div>  
      <div>
          <h4>Delete Parking Space</h4>
        <form method="post" action="delete-space.php"> 
        <p>
        <label>Space ID:</label><br>
        <input style="border: 1px solid #46E14E;  border-radius:5px" type="text" required size = "50" name = "space">
        </p>
      
        <input type="submit" name="submit" value="Delete" style="background-color: #46E14E; color: white; border-color: #46E14E; border-radius:5px">
        
        
       </form>
      </div>  
        </div>
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
   
}
     document.getElementById("defaultOpen").click();
</script>
         
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