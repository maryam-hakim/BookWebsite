<!DOCTYPE html>
<html lang="en">
<head>
<?php
include './header.php';
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./fonts.css">
    <title>My web</title>
</head>

<style>
    <?php include './fonts.css';
          include './style.css'; ?>
</style>
<body>
    

    
    <div class="cards">
        <?PHP  
            $sql = "SELECT idbook, title FROM book";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result) ){
                echo '<div class="card" style="height: 350px; margin-top: 50px; width: 250px; margin-left: 45px">';
                echo '<img src="./images/'. $row[0] .'.jpg" alt="card-img" class="card-img"  style="margin-top: 0px;">';
                echo '<p class="title">' . $row[1] . '</p>';
                echo '<div class="more">';
                echo '<a href="comment.php?id=' . $row[0] . '"> ادامه مطلب</a>';
                echo '</div>';
                echo '</div>';
            }

        ?>
    </div>

    
    <footer lang="fa-IR">
        <div id="us">
            <a href="#">تماس با ما</a>
            <label for="email">عضویت در خبرنامه</label>
            <input type="email" id="email" placeholder="email@gamil.com">
        </div>
        <div id="content" dir="rtl">
            تمامی حقوق 
            <br>
            این سایت 
            <br>
            متعلق به من است.
        </div>

    </footer>
    <script src="https://kit.fontawesome.com/4e47086ce5.js" crossorigin="anonymous"></script>
</body>
</html>