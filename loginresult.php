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
   // getting the postcode variable entered by the driver on the search        
$pcode = $_SESSION["postcode"];


// getting data from the space owner table
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
            <div><a style="font-family: PT Serif, serif;" class="navlink" href="logout.php"><i class="fa-solid fa-sign-out"></i> Sign out</a></div>
            <div><a style="font-family: PT Serif, serif;" class="navlink" href="users.php"><i class="fa-solid fa-user"></i> <?php echo $_SESSION["firstName"]. " ". $_SESSION["lastName"]; ?></a></div>
          
            
</div>
    
<div style="margin-top: 20px; margin-left:50px; height: 150px">
    
     <!--Displaying the search results  -->
    <div style = "margin-bottom: 30px; color: #46E14E"><?php echo $count. " result(s) came out from your search" ?></div>
    <table> 
        <tr>
        <?php   
            while($row = mysqli_fetch_assoc($result)){
                echo "Space ID: " . $row["ownerID"].   ",  Address: " . $row["address"]. ", Postcode " . $row["postcode"]. ", Space Type: ". $row["spaceType"]. "<br>";
                
            }
            ?>
        
        </tr>
    </table>
    <div style="margin-top:5px; color: darkred">*The hourly rate for all spaces is 2pounds.</div>  
        </div>
        
        
         <div class="pay">
     <div style="margin-top:10px; border: 1px solid; border-radius: 10px; width: 450px; padding: 10px"> 
          <!--Booking form -->
         <h3 style="text-align: center; color:#46E14E ; text-decoration: underline">Book now, Pay on arrival</h3>
            <form method="post" action="bookingform.php">
            <table>
               
                <tr><td style="padding: 5px">Space ID:</td>
                    <td style="padding: 5px"><input style="width:300px; border: 1px solid #46E14E; border-radius:5px"  name="spaceid" type="text" placeholder="Enter the Space ID " required></td>
                </tr>
                <tr>
                    <td style="padding: 5px">Date:</td>
                    <td style="padding: 5px"><input style="width:300px; border: 1px solid #46E14E;border-radius:5px "  name="date" type="date"></td>
                </tr>
                <tr>
                    <td style="padding: 5px">Time:</td>
                    <td style="padding: 5px"><input style="width:300px; border: 1px solid #46E14E; border-radius:5px"  name="time" type="time"></td>
                </tr>
                 <tr>
                <td>
                Hours:
                </td>
                <td>
        <select  name = "hours" required style="width:300px; border: 1px solid #46E14E; border-radius:5px">
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
        </select>
                    </td>
                </tr>
                 <tr>
                    <td><input style="color:white; background-color: #46E14E; border: 1px solid #46E14E; border-radius:5px" type="submit" value="Book Now" name="submit"></td>
                     
                </tr>
            </table>
            </form>

         </div>
    <div style="margin-top:10px; border: 1px solid; border-radius: 10px; width: 450px; padding: 10px"> 
        <h3 style="text-align: center; color:#46E14E ; text-decoration: underline">Book and Pay now with PayPal(Recommended) </h3>
              <form method="post" action="success.php">
            <table>
               
                <tr><td style="padding: 5px">Space ID:</td>
                    <td style="padding: 5px"><input style="width:300px; border: 1px solid #46E14E; border-radius:5px"  name="spaceid" type="text" placeholder="Enter the Space ID " required></td>
                </tr>
                <tr>
                    <td style="padding: 5px">Date:</td>
                    <td style="padding: 5px"><input style="width:300px; border: 1px solid #46E14E;border-radius:5px "  name="date" type="date"></td>
                </tr>
                <tr>
                    <td style="padding: 5px">Time:</td>
                    <td style="padding: 5px"><input style="width:300px; border: 1px solid #46E14E; border-radius:5px"  name="time" type="time"></td>
                </tr>
                 <tr>
                <td>
                Hours:
                </td>
                <td>
        <select  name = "hours" required style="width:300px; border: 1px solid #46E14E; border-radius:5px">
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
        </select>
                    </td>
                </tr>
                 <tr>
                    <td><input style="color:white; background-color: #46E14E; border: 1px solid #46E14E; border-radius:5px" type="submit" value="Book Now" name="submit"></td>
                    
                </tr>
            </table>
            </form>
    </div>
    
    
        </div> 
        <div style="text-align: center; margin-top: 40px; margin-bottom:40px;">
            <button style = " border-radius: 5px; background-color: #46E14E; border: 1px solid  #46E14E; width: 150px"><a style="color:white; text-decoration:none;" href="users.php"><i class="fa-solid fa-arrow-left"></i> Back</a></button></div>
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