<?php if(!isset($_SESSION)) 
 { 
	 session_start(); 
 } 
 ?>
<!DOCTYPE html>
<script type="text/javascript">
       var myWindow;
        function openWin(id){
            myWindow = window.open("./comment.php?id="+id, "myWindow",)}
        
      </script>

<style>
<?php include './comment.css';
      include './fonts.css';
      include './header.php'; ?>
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

    <?php
    $sql = "SELECT user.username, comment.text, comment.idtext  FROM comment INNER JOIN
            user ON comment.iduser = user.iduser
            where comment.idtext =" .$_REQUEST['id'];
    $result = mysqli_query($conn, $sql);
     while ( $row = mysqli_fetch_array($result) ){
      $data = $row['text'];
    }
    $sqll = "SELECT  comment.idbook  FROM comment 
    where comment.idtext =" .$_REQUEST['id'];
    $resultt = mysqli_query($conn, $sqll);
    $row = mysqli_fetch_array($resultt);
    $page = $row[0];
    ?>

    <body>
    

        <div class="edit">
            <h3>ویرایش نظر</h3>
            <div></div>
        <form method="post">
       <textarea name="comments" id="comments">
       <?php echo $data; ?>
        </textarea> 
        <input type="submit" class="btn" name="submit"> 
        
        
        
        
            
        </div>
        <?php
        if(isset($_POST['submit'])){
        $comments = $_POST['comments'];
        // $sql = "UPDATE comment SET comment.text ='" .$comments . "'WHERE comment.idtext=" .$_REQUEST['id'];
        // $result = mysqli_query($conn, $sql);
        $sql = "DELETE FROM comment WHERE comment.idtext=" .$_REQUEST['id']; 
        $result = mysqli_query($conn, $sql);
        

            $username = $_SESSION['username'];
            $sql = "SELECT `iduser` FROM `user` WHERE `username`= '".$username."'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_row($result) ){
              $iduser = $row[0];
            $stmt = $conn->prepare("INSERT INTO temp_comment (iduser, idbook, text) VALUES (?, ?, ?)");
            $stmt->bind_param("iis",  $iduser , $_SESSION['idbook'], $comments );
            $stmt->execute();
            
   
            $stmt->close();
          }
          echo"<script>alert('دیدگاه شما در انتظار تایید است.')</script>";
        echo '<script>  window.open("./comment.php?id=' .$page. '","_self");</script>';
        }
        ?>

      
    </body>


</html>