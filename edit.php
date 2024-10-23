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
          



    ?>
<html lang="en">
    <meta charset="utf-8">
    <head>
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
        <div style="text-align:center; text-decoration:underline; color:  #46E14E"><h3>Enter new booking details</h3></div>
        
         <div style="text-align: center; margin-top: 50px; margin-bottom: 100px;  width: 550px; margin-left: auto; margin-right: auto; height: 300px; border: 1px solid ; border-radius: 10px ">
           
   
        
    <form action="edit-act.php" method="post" >
    <table style="margin-top: 40px">
       <tr> 
           <td style="padding: 10px"><label>Booking ID:</label></td>
           <td style="padding: 10px">   <input style="border: 1px solid #46E14E;  border-radius:5px" type="text" required size = "50" name = "id"></td>
        </tr>
          <tr> 
           <td style="padding: 10px"><label>Hours:</label></td>
       <td style="padding: 10px">     <select  name = "hours" required style="width:368px; border: 1px solid #46E14E; border-radius:5px">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
           </select></td>
        </tr>
     
        <tr> 
           <td style="padding: 10px"><label>Date:</label></td>
           <td style="padding: 10px">   <input style="border: 1px solid #46E14E;  border-radius:5px; width:368px" type="date" required  name = "date"></td>
        </tr>
          <tr> 
           <td style="padding: 10px"><label>Time:</label></td>
           <td style="padding: 10px">   <input style="border: 1px solid #46E14E;  border-radius:5px; width:368px" type="time" required  name = "time"></td>
        </tr>
        <tr> 
          
           <td style="padding: 10px">   <input style="border: 1px solid #46E14E;  border-radius:5px; width:100px; background-color:#46E14E; color: white" type="submit" required  name = "submit"></td>
            <td>  <button style = " border-radius: 5px; background-color: #46E14E; border: 1px solid  #46E14E"><a style="color:white; text-decoration:none;" href="users.php"><i class="fa-solid fa-arrow-left"></i>Back</a></button></td>
        </tr>
        </table> 
        
       </form>
       
      

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