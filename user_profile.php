<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include './header.php';
?>







<?php

$servername = "localhost";
$username = "root";
$password = "1993";
$dbname = "book-store";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<style>
<?php include './style.css';
      include './fonts.css';
  ?>
</style>
<body dir=rtl>

<div class="profile-main">
     <div class="profile-menu">
         <div class="profile-info">
             <div class="profile-svg">
                 <img src="./images/person-circle.svg" alt="person-svg">
             </div>
             <div class="profile-username">
             <?php
             $username = $_SESSION['username'];
             echo $username;
             echo '<br>';
             echo '</div>';
             echo '<div class="profile-mobile">';
             $sql = "SELECT `mobile` FROM `user` WHERE `username`= '" .$username."' ";
             $result = mysqli_query($conn, $sql);
             while ($row = mysqli_fetch_array($result) ){
               echo $row[0];
             }
             echo '</div>';
             ?>
            
         </div>
         <div class="partition"></div>
         <div class="profile-submenu">
                 <div class="submenu-list">
                 <img src="./images/icons8-message-50.png" alt="message">
                 <form method="post">
                 <button name="submit">نظرهای من</button>
                </form>
                </div>
                <div class="submenu-list">
                 <img src="./images/icons8-logout-50.png" alt="logout">
                 <a href="./logout.php" id="exit">خروج</a>
                 </div>
         </div>

     </div>

     <div class="profile-content" id="profile_content">
    <?php
    if (!isset($_POST['submit'])) {
      echo '<p class="welcome">'.$username.' عزیز خوش آمدید </p>';
      echo '<p class="welcome-sub"> خوش‌حالیم که نظراتت رو با ما به اشتراک میذاری؛ 
      در قسمت <span>نظرهای من</span> میتونی نظراتت رو ببینی. </p>';
      
    } elseif(isset($_POST['submit'])) {
     $sql = "SELECT comment.text, book.title
     FROM comment
     INNER JOIN book
     ON comment.idbook = book.idbook
     INNER JOIN user
     ON comment.iduser = user.iduser
     where `username` ='" .$username."' ";
    $result = mysqli_query($conn, $sql);
     while ( $row = mysqli_fetch_array($result) ){
      echo '<div class="profile-comment">';
      echo '<div class="title"><h3>' ,'درباره کتاب '. $row['title'] .':', '</h3></div>';
      echo '<p  class="comment-text">' . $row['text'] . '</p>';
      echo '</div>';
     }
    }
    ?>
     </div>

 </div>


 
</body>
</html>