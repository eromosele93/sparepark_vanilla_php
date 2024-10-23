<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "sparepark";
$conn = mysqli_connect($server, $username, $password, $db);
if (!$conn){
    
    die("Connection failed:" .mysqli_connect_error());
    
}
// Retrieving data from country table to display on dropdown
$sql = "SELECT * FROM country";
$countries = mysqli_query($conn, $sql);

// Retrieving data from city table to display on dropdown
$sql1 = "SELECT * FROM city";
$cities = mysqli_query($conn, $sql1);

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
    
            <div><a style="font-family: PT Serif, serif"  class="navlink" href="home.html"><i class="fa-solid fa-house"></i> Home</a></div>
             <div><a style="font-family: PT Serif, serif;" class="navlink" href="products.html"><i class="fa-solid fa-network-wired"></i>Products</a></div>
            <div><a style="font-family: PT Serif, serif;" class="navlink" href="about.html"><i class="fa-solid fa-building"></i> About us</a></div>
            <div><a style="font-family: PT Serif, serif" class="navlink" href="signin.html"><i class="fa-solid fa-right-to-bracket"></i> Login</a></div>
            
            <div><a class="navlinkrent" href="">Rent out your space</a></div>
</div>
    
        <div  style="text-align: center; margin-top: 10px; margin-bottom: 10px;  width: 550px; margin-left: auto; margin-right: auto ">
   <fieldset style="width: 600px">
       <legend>Sign up</legend>
       <center style = "color:red">* All fields are required</center>
    <form action="register-act.php" method="post">
        <table>
            <tr class="sign">
                <td>
        <label>First Name:</label>
                </td>
                <td>
        <input style="border: 1px solid #46E14E; border-radius:5px" type="text" required size = "50" name = "fName">
                </td>
            </tr>
            <tr class="sign">
                <td>
        <label>Last Name:</label>
                </td>
                <td>
        <input style="border: 1px solid #46E14E; border-radius:5px" type="text" required size = "50" name = "lName">
                </td>
            </tr>
            <tr class="sign">
            <td>
        <label>Email:</label>
            </td>
            <td>
        <input style="border: 1px solid #46E14E; border-radius:5px" type="text" required size = "50" name = "email">
            </td>
            </tr>
            <tr class="sign">
                <td>
        <label>Phone:</label>
                </td>
                <td>
        <input style="border: 1px solid #46E14E; border-radius:5px" type="text" required size = "50" name = "phone">
                </td>
            </tr>
            <tr class="sign">
                <td>
        <label>Password:</label>
                </td>
                <td>
        <input style="border: 1px solid #46E14E; border-radius:5px" type="password" required size = "50" name = "password">
                </td>
            </tr>
            <tr class="sign">
                <td>
        <label>Address:</label>
                </td>
                <td>
        <input style="border: 1px solid #46E14E; border-radius:5px" type="text" required size = "50" name = "address">
                </td>
            </tr>
            <tr class="sign">
                <td>
        <label>Country:</label>
                </td>
                <td>
        <select  name = "Country" required style="width:370px; border: 1px solid #46E14E; border-radius:5px">
            <option></option>
            <?php
            // Displaying the retrieved data from country table on dropdown
            while($country = mysqli_fetch_array($countries, MYSQLI_ASSOC)):;
            ?>
            <option value = "<?php echo $country["countryID"];?>"> <?php echo $country["countryName"]; ?></option>
            
           <?php
            endwhile;
            ?>
        </select>
                </td>
            </tr>
            <tr class="sign">
                <td>
        <label>City:</label>
                </td>
                <td>
        <select name = "City" required style="width:370px; border: 1px solid #46E14E; border-radius:5px">
            <option></option>
            <?php
            // Displaying the retrieved data from city table on dropdown
            while($city = mysqli_fetch_array($cities, MYSQLI_ASSOC)):;
            ?>
            <option value = "<?php echo $city["cityID"];?>"> <?php echo $city["cityName"]; ?></option>
            
           <?php
            endwhile;
            ?>
        </select>
                </td>
            </tr>
            <tr class="sign">
                <td>
        <label>Post Code:</label>
                </td>
                <td>
        <select name = "pCode" required style="width:370px; border: 1px solid #46E14E; border-radius:5px">
            <option></option>
            <?php
            // Displaying the retrieved data from postcode table on dropdown
            while($pCode = mysqli_fetch_array($pCodes, MYSQLI_ASSOC)):;
            ?>
            <option value = "<?php echo $pCode["postcodeID"];?>"> <?php echo $pCode["postcode"]; ?></option>
            
           <?php
            endwhile;
            ?>
        </select>
                </td>
            </tr>
            <tr class="sign">
                
                <td style="text-align: right"><input type="checkbox" name="agree" 
                            required /> </td>
                <td style="font-size: 12px">Agree to our <a href="privacy.html">Privacy Policy</a> and <a href="terms.html"> Terms and conditions</a></td>
            </tr>
            <tr class="sign"><td>
        <input style="background-color: #46E14E; color: white; border-color: #46E14E; border-radius: 5px" type="submit" name="submit" value="Register" type="submit" value="submit">
                </td>
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