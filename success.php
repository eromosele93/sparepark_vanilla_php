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
if (isset($_POST['submit'])) { 
  $_SESSION['date'] = $_POST['date'];
    $_SESSION['time'] = $_POST['time'];
    $_SESSION['hours'] = $_POST['hours'];
    $_SESSION['spaceid'] = $_POST['spaceid'];
  }
$amount =  $_SESSION['hours'] * 2;
$cusID =  $_SESSION['$cID'];
 $sID = $_SESSION['spaceid'];
$sql2 = "select * from driver where customerID = '$cusID'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
$_SESSION['dphone'] = $row2['phone'];

// geting the space owner ID from the space owner table using his spaceID
$sql = "select * from spaceowner where ownerID = '$sID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$_SESSION['address'] = $row['address'];
$_SESSION['postcode'] = $row['postcode'];
$_SESSION['email'] = $row['email'];
$_SESSION['phone'] = $row['phone'];
$_SESSION['spaceType'] = $row['spaceType'];
$_SESSION['customerID'] = $row['customerID'];



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
             <div><a style="font-family: PT Serif, serif;" class="navlink" href="logout.php"><i class="fa-solid fa-sign-out"></i> Sign out</a></div>
            <div><a style="font-family: PT Serif, serif;" class="navlink" href="users.php"><i class="fa-solid fa-user"></i> <?php echo $_SESSION["firstName"]. " ". $_SESSION["lastName"]; ?></a></div>
</div>
        
       
        <div style="text-align: center; margin-bottom:0px; margin-top: 20px; text-decoration:underline"><h4>Pay £<?php echo $amount ?> by clicking the button</h4></div>
        <div style=" width: 300px; height: 150px; padding:40px; margin-bottom:50px; margin-Left: 500px">
               
            <div style="width: 50px; text-align: center" id = "paypal-payment-button">   
              
          <!--Integrating PayPal-->       
    <script src="https://www.paypal.com/sdk/js?client-id=Ad0Slk1jHomE8pD0WaihM72z-DTwseNj5_54IGj9CSejaGqyI5PgjUMqTsdD83Rt_AzJSJS7f0npt_t4&disable-funding=credit,card"></script>
  <script> paypal.Buttons({
style:{
    
    
    },  createOrder:function(data, actions){
    return actions.order.create({
    
    purchase_units:[{
    amount:{
    value: <?php echo $amount; ?>
       
}
}]
});
}, 
    onApprove: function(data, actions){
        return actions.order.capture().then(function(details){
            console.log(details)
            window.location.replace("http://localhost/assessment/confirm.php")
        })
    },
    onCancel: function(data){
       window.location.replace("http://localhost/assessment/loginresult.php")  
    }
      }).render('#paypal-payment-button');</script>
              <!--End of Paypal Integration -->   
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