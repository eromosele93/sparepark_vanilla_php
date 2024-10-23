<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$db = "sparepark";
//Import PHPMailer classes into the global namespace

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
$conn = mysqli_connect($server, $username, $password, $db);
if (!$conn){
    
    die("Connection failed:" .mysqli_connect_error());
    
}
// getting data from the form field
$date = $_POST["date"];
$time = $_POST["time"];
$hours = $_POST['hours'];
$sID = $_POST['spaceid'];
$amount = $hours * 2;



$cusID =  $_SESSION['$cID'];
$dlname  = $_SESSION["lastName"];
$dfname = $_SESSION["firstName"];

// getting the drivers information from the drivers table using his customer ID
$sql2 = "select * from driver where customerID = '$cusID'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
$dphone = $row2['phone'];

// geting the space owner ID from the space owner table using his spaceID
$sql = "select * from spaceowner where ownerID = '$sID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$address = $row['address'];
$postcode = $row['postcode'];
$email = $row['email'];
$phone = $row['phone'];
$spaceType = $row['spaceType'];
$spaceCusID = $row['customerID'];


// inserting all the retrieved data to the booking table
$sql1 = "INSERT INTO booking(hours, ownerID, amount, spaceaddress, spacepostcode, owneremail, ownerphone, driverID, spaceType, date, time, customerID, paidOnline) VALUES ('$hours', '$sID', '$amount','$address', '$postcode', '$email', '$phone', $cusID, '$spaceType','$date','$time', '$spaceCusID', 'No' )";

if (!mysqli_query($conn, $sql1)){
    
    die('Error in query:' . mysqli_error());

}
else{
    
    $last_id = mysqli_insert_id($conn);
    
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'eromosele.okoudoh@gmail.com';                     //SMTP username
    $mail->Password   = 'dkkakgqqmmcuobjm';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('eromosele.okoudoh@gmail.com', 'SparePark');
    $mail->addAddress($email, 'Space Owner');     //Add a recipient
  

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Booking Notification";
    $mail->Body    = "Dear Space Owner<br> <br>You have a new booking on your space with <br>Address ". $address ."<br>". "Date ". $date."<br>". "Time ". $time. "<br>"."Hours". $hours .  "<br>"."<br>". "The drivers details are below <br> " ." Phone: " . $dphone. "<br>" . " Name: ". $dfname. " ". $dlname . "<br>". "<br>"."Warm regards <br> SparePark";
   

    $mail->send();  
}
mysqli_close($conn);
 

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
        <title>SparePark</title>
    </head> 
    <body>
        <div class="head-container">
            <div><a href="home.html"><img alt="SparePark logo" style  ="width:280px; height:50px" src="images/logo.png"></a>
             </div>
    
            <div><a style="font-family: PT Serif, serif;" class="navlink" href="products.html"><i class="fa-solid fa-network-wired"></i>Products</a></div>
            <div><a style="font-family: PT Serif, serif;" class="navlink" href="about.html"><i class="fa-solid fa-building"></i> About us</a></div>
             <div><a style="font-family: PT Serif, serif;" class="navlink" href="logout.php"><i class="fa-solid fa-sign-out"></i> Sign out</a></div>
            <div><a style="font-family: PT Serif, serif;" class="navlink" href="users.php"><i class="fa-solid fa-user"></i> <?php echo $_SESSION["firstName"]. " ". $_SESSION["lastName"]; ?></a></div>
</div>
        
        <div style = "padding: 30px; margin-top:50px; margin-bottom:80px; height: 350px" >
            
             <!--Displaying the booking details -->
        <div style="margin-bottom: 20px; color: #46E14E">Congratulations <?php echo $_SESSION["firstName"]; ?> Your booking is successful. Below is your booking details</div>
        <div><?php
  echo "Booking ID: " . $last_id.   ",  Address: " . $address. ", Postcode: " . $postcode. ", Space Type: ". $spaceType. ", Date:". $date . ", Time: " . $time . "<br>"; ?>
            <div style="margin-top: 10px"><u>Space Owner contact details</u></div>
           <?php echo "Phone: " . $phone.   ",  Email: " . $email.  "<br>"; ?>
        </div>
             <div style="text-align: left; margin-top: 30px"><button style = "font-size: 16px;  padding: 5px 10px; border-radius: 5px; background-color: #46E14E; border: 1px solid  #46E14E"><a style="color:white; text-decoration:none;" href="users.php"><i class="fa-solid fa-arrow-left"></i>Back</a></button>
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