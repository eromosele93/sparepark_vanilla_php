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
 $fName =  $_SESSION["firstName"];
$lName =   $_SESSION["lastName"];
$cID = $_SESSION['$cID'];
$_SESSION['$cID'] = $cID;
// Retrieving data from postcode table to display on dropdown
$sql2 = "SELECT * FROM postcode";
$pCodes = mysqli_query($conn, $sql2);
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
        <title>SparePark</title>
    </head> 
    <body>
       <div class="head-container">
            <div><a href="home.html"><img alt="SparePark logo" style ="width:280px; height:50px" src="images/logo.png"></a>
             </div>
   
           <div><a style="font-family: PT Serif, serif;" class="navlink" href="products.html"><i class="fa-solid fa-network-wired"></i>Products</a></div>
            <div><a style="font-family: PT Serif, serif;" class="navlink" href="about.html"><i class="fa-solid fa-building"></i> About us</a></div>
            <div><a style="font-family: PT Serif, serif" class="navlink" href="logout.php"><i class="fa-solid fa-sign-out"></i> Sign out</a></div> 
            <div><a style="font-family: PT Serif, serif;" class="navlink" href="users.php"><i class="fa-solid fa-user"></i> <?php echo $fName ." ". $lName ?></a></div>
            
            
</div>
        <div  style="text-align: center; margin-top: 10px; margin-bottom: 10px;  width: 550px; margin-left: auto; margin-right: auto; height: 400px ">
   <fieldset style="width: 600px">
       <legend>Add Space</legend>
        
    <form action="addspace-act.php" method="post" enctype="multipart/form-data">
        <table>
            <tr class="sign">
                <td>
        <label>Email:</label>
                </td>
                <td>
        <input style="border: 2px solid #46E14E; border-radius:5px" type="text" required size = "50" name = "email">
                </td>
            </tr>
            <tr class="sign">
                <td>
        <label>Address:</label>
                </td>
                <td>
        <input style="border: 2px solid #46E14E; border-radius:5px" type="text" required size = "50" name = "address">
                </td>
            </tr>
           
            <tr class="sign">
                <td>
        <label>Phone:</label>
                </td>
                <td>
        <input style="border: 2px solid #46E14E; border-radius:5px" type="text" required size = "50" name = "phone">
                </td>
            </tr>
            
            <tr class="sign">
                <td>
        <label>Space Type:</label>
                </td>
                <td>
                    <select required = "required" style="width:370px; border: 2px solid #46E14E; border-radius:5px" name="type">
                        <option></option>
                        <option value = "Private Drive-way"> Private Drive-way</option>
                        <option value = "Garage"> Garage</option>
                    </select>
                </td>
            </tr>
            
           
            <tr class="sign">
                <td>
        <label>Post Code:</label>
                </td>
                <td>
        <select name = "pCode" required style="width:370px; border: 2px solid #46E14E; border-radius:5px">
            <option></option>
            <?php
            // Displaying the retrieved data from postcode table on dropdown
            while($pCode = mysqli_fetch_array($pCodes, MYSQLI_ASSOC)):;
            ?>
            <option value = "<?php echo $pCode["postcode"];?>"> <?php echo $pCode["postcode"]; ?></option>
            
           <?php
            endwhile;
            ?>
        </select>
                </td>
            </tr>
           
            <tr class="sign"><td>
        <input style="background-color: #46E14E; color: white; border-color: #46E14E; border-radius: 5px" type="submit" name="submit" value="Add Space" type="submit" >
                </td>
                <td><div><button style = " border-radius: 5px; background-color: #46E14E; border: 1px solid  #46E14E;"><a style="color:white; text-decoration:none;" href="users.php"><i class="fa-solid fa-arrow-left"></i>Back</a></button></div></td>
            </tr>
        </table>
    </form>
    </fieldset>
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