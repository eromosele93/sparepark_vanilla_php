<?php
$email = $_POST['email'];
$message = $_POST['message'];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
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
    $mail->setFrom($email, 'Customer');
    $mail->addAddress("eromosele.okoudoh@gmail.com", 'Customer Support');     //Add a recipient
    //Contents
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Customer Feedback, Reviews and Complaint";
    $mail->Body    = "<h4>New Message from customer with email</h4><br> ". $email . "<br><br>". "Below are the content of the message<br><br><br>". $message;
    $mail->send();
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="images/logo.png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alkatra&family=PT+Serif&family=Quicksand:wght@300&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/85664424c0.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">
        <link rel="stylesheet" href="css/main.css" />
        <title>
            SparePark
        </title>
    </head>
    <body>
        <div class="head-container">
            <div><a href="home.html"><img alt="SparePark logo" style ="width:280px; height:50px" src="images/logo.png"></a>
             </div>
   
            <div><a style="font-family: PT Serif, serif;" class="navlink" href="about.html"><i class="fa-solid fa-building"></i> About us</a></div>
            <div><a style="font-family: PT Serif, serif;" class="navlink" href="products.html"><i class="fa-solid fa-network-wired"></i>Products</a></div>
            <div><a style="font-family: PT Serif, serif" class="navlink" href="signin.html"><i class="fa-solid fa-right-to-bracket"></i> Login</a></div>
            <div><a style="font-family: PT Serif, serif"  class="navlink" href="register.php"><i class="fa-solid fa-user"></i> Sign up</a></div>
            <div><a class="navlinkrent" href="">Rent out your space</a></div>
</div>
       <div style="text-align: center; margin-top: 50px; margin-bottom: 50px;  width: 550px; margin-left: auto; margin-right: auto; height: 400px ">
           Message sent successfully
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
