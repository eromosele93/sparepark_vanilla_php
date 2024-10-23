<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    
    header ("location: signin.html");
        exit;
}

$cID = $_SESSION["customerID"];
$server = "localhost";
$username = "root";
$password = "";
$db = "sparepark";

$conn = mysqli_connect($server, $username, $password, $db) or die ("Not connected");

/* Retriveing the user firstname, lastname, address, phone, postcode, postcodeID, spacetype, email from useraccount and driver using the inner join */
$sql = "select useraccount.email, driver.postcodeID, postcode.postcode, useraccount.firstName, useraccount.lastName, driver.address, driver.phone from useraccount inner join driver on useraccount.customerID = driver.customerID INNER JOIN postcode ON postcode.postcodeID = driver.postcodeID where useraccount.customerID = $cID";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);



$fName = $row['firstName'];
$lName = $row['lastName'];
$email = $row['email'];
$phone = $row['phone'];
$address = $row['address'];
$postcode = $row['postcode'];

$_SESSION["firstName"] = $fName;
$_SESSION["lastName"] = $lName;
$_SESSION['$cID'] = $cID;




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
            <div><a style="font-family: PT Serif, serif" class="navlink" href="logout.php"><i class="fa-solid fa-sign-out"></i> sign out</a></div> 
            <div><a style="font-family: PT Serif, serif;" class="navlink" href="users.php"><i class="fa-solid fa-user"></i> <?php echo $fName ." ". $lName;  ?></a></div>
            
            
</div>
        <div style="background-color: #F5F5F5; height: 40px; padding: 10px; color:#46E14E">
        Welcome <?php echo $fName ."!!!"  ?>
        </div>
        
      

<div style="margin-top: 20px" class="tab">
  <button class="tablinks" onclick="openCity(event, 'Space-owner')" id="defaultOpen"><i class="fa-solid fa-home"></i> Space-owner</button>
    <button class="tablinks" onclick="openCity(event, 'Driver')"><i class="fa-solid fa-car"></i> Driver</button>
  
</div>

<div style="min-height: 500px; margin-top: 20px" id="Space-owner" class="tabcontent">
   
        
    <div style="margin-bottom: 20px; "><buttton style = "font-size: 16px;  padding: 5px 10px; border-radius: 5px; background-color: #46E14E; border: 1px solid  #46E14E"><a href="addspace.php" style="color:white; text-decoration:none;"><i class="fa-solid fa-plus"></i>Add space</a></buttton>
    <buttton style = "font-size: 16px;  padding: 5px 10px; border-radius: 5px; background-color: #46E14E; border: 1px solid  #46E14E"><a href="" style="color:white; text-decoration:none; "><i class="fa-regular fa-trash-can"></i>Delete space</a></buttton>
         <buttton style = "font-size: 16px;  padding: 5px 10px; border-radius: 5px; background-color: #46E14E; border: 1px solid  #46E14E"><a href="view-bookings.php" style="color:white; text-decoration:none; "><i class="fa-regular fa-eye"></i>View Bookings</a></buttton>
    </div>
      
    <div style="color: #46E14E; text-decoration:underline">  
       
    <table>
        
        <tr><?php $sql2 = "select * from spaceowner where customerID = $cID";
            $result2 = mysqli_query($conn, $sql2);
            $count = mysqli_num_rows($result2);
            if (mysqli_num_rows($result2) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result2)) {
        echo "Space ID: " . $row["ownerID"].   ",  Address: " . $row["address"]. ", Postcode " . $row["postcode"]. ", Space Type: ". $row["spaceType"]. "<br>";
  
    }
            
                
                
} else {
    echo "0 results";

            
            }

            
            ?>
            
        </tr>
        
        </table>
     
    </div>
    <div style="margin-top:20px; text-decoration: none"><?php echo "Dear ". $fName . " " . "you have " . $count. " space(s) listed"; ?></div> 
</div>

<div style="min-height: 500px; margin-top: 0px" id="Driver" class="tabcontent">
 <div class="driver">
             <div style="flex-grow: 2;  border: 1px solid #46E14E; border-radius: 10px" >
            <p style=" font-family:sans-serif; font-size: 18px; color: black "><b>Find and book parking space within a minute</b> </p>
                
                 
                 
                 
            <!-- <h3>Google Maps</h3> -->
    <div id="google-map" style="width:400px; height:200px; margin-left:auto; margin-right:auto">
    </div>
    <script>
        
        let map;
        async function initMap() {
            //@ts-ignore
            const { Map } = await google.maps.importLibrary("maps");

            map = new Map(document.getElementById("google-map"), {
                center: { lat: 51.503399, lng: -0.119519 },
                zoom: 8,
            });
        }

        initMap();
    </script>

      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHfx2CYJYVM00pn_GUTcIDMfGIpWztRWY&callback=initMap"></script>
            <form style="margin-top: 20px" method="post" action="loginsearch.php">
                <input style="border: 2px solid #46E14E; border-radius: 10px; width: 400px; height: 40px; " type="text" placeholder="Search by postcode" name="pcode"><br><p></p>
                <input style="background-color: #46E14E; color: white; border: none;padding: 10px 10px;cursor: pointer; width: 400px; height: 40px; border-radius: 10px" type="submit" value="show parking spaces">
            </form>
            </div>
     
           
            <div style="width: 550px; height: 450px;  font-style: italic; font-weight: bold; ">
                <div style="text-align: right;"><button style = "font-size: 16px;  padding: 5px 10px; border-radius: 5px; background-color: #46E14E; border: 1px solid  #46E14E"><a style="color:white; text-decoration:none;" href=""><i class="fa-solid fa-star"></i>Rate bookings</a></button>
                    <button style = "font-size: 16px;  padding: 5px 10px; border-radius: 5px; background-color: #46E14E; border: 1px solid  #46E14E"><a style="color:white; text-decoration:none;" href="edit.php"><i class="fa-solid fa-edit"></i>Edit bookings</a></button>
                    <button style = "font-size: 16px;  padding: 5px 10px; border-radius: 5px; background-color: #46E14E; border: 1px solid  #46E14E"><a style="color:white; text-decoration:none;" href="view.php"><i class="fa-solid fa-eye"></i>View bookings history</a></button>
                   </div>
                  
                
            
     </div>
    
           
        </div>
</div>



<script>
function openCity(evt, role) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(role).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
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
