<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "sparepark";

$conn = mysqli_connect($server, $username, $password, $db) or die ("Not connected");

// Declaring postcode value for the form field  
$postcode = $_POST['pCode'];

// Inserting data email, password, firstName and lastName to the useraccount table
$sql1 = "INSERT INTO useraccount (email, password, firstName, lastName) VALUES ('$_POST[email]', '$_POST[password]', '$_POST[fName]','$_POST[lName]')";

if (!mysqli_query($conn, $sql1)){
    
    die('Error in query:' . mysqli_error());

}
else{
    // getting the lastID which is the customerID
    $last_id = mysqli_insert_id($conn);   
}
// Inserting data lastID which is the customerID, postcodeID, address and phone into driver table
$sql2 = "INSERT INTO driver (customerID, postcodeID, address, phone) VALUES ('$last_id', '$postcode' , '$_POST[address]','$_POST[phone]')";

if (!mysqli_query($conn, $sql2)){
    
    die('Error in query:' . mysqli_error());
}
else{
}
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
        <div style="height: 400px">
        <p>Registration successfull. <a href="signin.html">Click here</a> to signin</p>
        </div>
    </body>
    
      <div class="privacy">
            <div>
                <p style="color: white"> Social Media</p>
                    <img alt="Twitter logo" src="images/tw.png" style="width: 30px; height: 30px">
                    <img alt="Linkedin logo" src="images/lk.png" style="width: 30px; height: 30px">
                    <img alt="Facebook logo" src="images/fb.png" style="width: 30px; height: 30px">
            </div>
            <div> 
                    <a class="p" href="privacy.html">Privacy Policy</a>
                    <a class ="p" href="terms.html">Terms and conditions</a>
                <a class="p" href="contact.html">Contact us</a>
                <div style="text-align: center"><img alt="SparePark Logo with different Variation" style="width: 250px; height: 50px" src="images/3logo.png"></div>
            </div>
            <div>
                <a href=""> <img alt="Google play logo"  src="images/google.png" style="width: 150px; height: 50px"></a>
            </div>
        </div>
</html>