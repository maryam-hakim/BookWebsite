<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
	
} 
include("./admin-area/include/db.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
require_once "vendor/autoload.php";


$idbook = $_SESSION["idbook"];
$iduser = $_SESSION["iduser"];
// $Status = $_SESSION["status"];
if($_REQUEST['id'] == 0){
    $Status = "تایید";
}
elseif($_REQUEST['id'] == 1){
    $Status = "رد";
}

$sql = "SELECT title FROM book WHERE idbook=" .$idbook;
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result) ){
    $bookName = $row[0] ;
}

$sql2 = "SELECT email FROM user WHERE iduser=" .$iduser;
$result2 = mysqli_query($conn, $sql2);
while ($row = mysqli_fetch_array($result2) ){
    $Destination = $row[0] ;
}


$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->SMTPDebug = SMTP::DEBUG_OFF;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Port = 587;
$mail->Host = "smtp.gmail.com";
$mail->Username = "hakimbookshelf@gmail.com";
$mail->Password = "password";

$mail->From = "hakimbookshelf@gmail.com";
$mail->FromName = "Hakimbookshelf";

$mail->addAddress($Destination);

 $mail->isHTML(true);

$mail->Subject = "Click to see Your comment status in hakimbookshelf";
$mail->Body = "دیدگاه شما درباره کتاب $bookName $Status شد";
$mail->AltBody = "$Status";
$mail->send();
        

echo"<script>window.open('./admin-area/index.php','_self')</script>";

// try {
    
//     echo "Message has been sent successfully";
// } catch (Exception $e) {
//     echo "Mailer Error: " . $mail->ErrorInfo;
// }
