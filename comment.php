<?php
session_start();
include './header.php';
error_reporting(0);
?>
<!DOCTYPE html>
<body dir=rtl>
  

<style>
<?php include './style.css';
      include './fonts.css';
  ?>
</style>

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


    <div class="comment-main">
      <div class="comment-main-img">
        <?PHP  
            $id="";
            $sql = "SELECT idbook FROM book WHERE idbook=" .$_REQUEST['id'];
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result) ){
                echo '<img src="./images/'. $row[0] .'.jpg" alt="card-img" class="book-img">';
                $GLOBALS['id'] = $row[0];
                $_SESSION['idbook'] = $row[0];
            }

        ?>
      </div>

      <div class="comment-main-text">
        <div>
          <?PHP  
            $sql = "SELECT title FROM book WHERE idbook=" .$_REQUEST['id'];
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result) ){
                echo '<p class="book-title">' . $row[0] . '</p>';
            }
          ?>
        </div>
          <div >
          <?PHP  
            $sql = "SELECT brief FROM book WHERE idbook=" .$_REQUEST['id'];;
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result) ){
                echo '<p class="book-brief">' . $row[0] . '</p>';
            }
          ?>
          </div>

          </div>
        </div>



  <div class="comments" >
    <div class="write-comment">
     <h2>دیدگاه</h2>
     <div class="div"></div>
       <form method="post">
       <textarea type="text" name="text" id="comment-input" placeholder="دیدگاهتان را وارد کنید..."></textarea>
       <div class="comment-footer" >
         <div class="right-comment">
         
         
         <?php
         if(!isset($_SESSION['username']))
           {
          
           echo '<a href="./user_login.php?id='.$id . '" class="btn register-btn" > وارد شوید</a> ';  
   
           }
           else if(isset($_SESSION['username']))
           {
                   
            echo '<button name="checkout" class="btn hidden-btn" >تایید</button>';
          
                   
           }
           
                   
         ?>
         </div>
          </div>
    </form>   
       
    </div>

   

   <?php
     if(isset($_POST['checkout'])){
       if(!empty(isset($_POST['text']))){

         $username = $_SESSION['username'];
         $sql = "SELECT `iduser` FROM `user` WHERE `username`= '".$username."'";
         $result = mysqli_query($conn, $sql);
         while ($row = mysqli_fetch_array($result) ){
           $iduser = $row[0];
         }
         $stmt = $conn->prepare("INSERT INTO temp_comment (iduser, idbook, text) VALUES (?, ?, ?)");
         $stmt->bind_param("iis",  $iduser , $GLOBALS['id'], $_POST['text'] );
         $stmt->execute();
         

         $stmt->close();
       }
       echo"<script>alert('دیدگاه شما در انتظار تایید است.')</script>";
			//  echo"<script>window.open('./index.php?view_comment','_self')</script>";
        
     }


    $sql = "SELECT user.username, comment.text, comment.idtext  FROM comment INNER JOIN
            user ON comment.iduser = user.iduser
            where comment.idbook =" .$_REQUEST['id'];
    $result = mysqli_query($conn, $sql);
     while ( $row = mysqli_fetch_array($result) ){
      echo '<div class="comment">';
      echo '<div class="username"><h3>' . $row['username'] . '</h3></div>';
      echo '<p  class="comment-text">' . $row['text'] . '</p>';
      echo '<div class="comment-footer">';
      echo'<div class="right-comment">';
      
      
      // $isset = array_key_exists('$_SESSION["username"]', get_defined_vars());
      // if($isset == true){
        if(($_SESSION["username"]) == $row["username"]){
          echo '<a href="./editcomment.php?id=' . $row['idtext'] . '"><button class="btn" >ویرایش </button></a>';
          echo '<a href="./deletecomment.php?id=' . $row['idtext'] . '"><button class="btn" id="delete">حذف</button></a>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }elseif(!array_key_exists('$_SESSION["username"]', get_defined_vars())){
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        
      
     
      

     
      

    }
    ?>
  </div>
 








  </body>
</html>