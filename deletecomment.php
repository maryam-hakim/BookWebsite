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

$sqll = "SELECT  comment.idbook  FROM comment 
    where comment.idtext =" .$_REQUEST['id'];
    $resultt = mysqli_query($conn, $sqll);
    $row = mysqli_fetch_array($resultt);
    header("Location:comment.php?id= $row[0]");
    
    
    $sql = "DELETE FROM comment WHERE comment.idtext=" .$_REQUEST['id']; 
    $result = mysqli_query($conn, $sql);
    exit;
    
?>