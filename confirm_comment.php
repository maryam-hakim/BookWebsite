<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
	
} 
?>

<html lang="fa"  dir="rtl">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
		<?php 	
			
			include("./include/db.php");
            
			if(isset($_GET['conf_comment'])){
				$conf_id_comment = $_GET['conf_comment'];
                $sql = "SELECT * FROM `temp_comment` where `id-temp-comment` = '".$conf_id_comment."'";
                $result = mysqli_query($conn, $sql);
                 while($row=mysqli_fetch_array($result))
                {
                    $iduser = $row[1];
                    $idbook = $row[2];
                    $text = $row[3];
					
                }
				$stmt = $conn->prepare("INSERT INTO comment (text, idbook, iduser) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $text, $idbook , $iduser);
                $stmt->execute();
                

                $stmt->close();

                $delete_id_comment = $_GET['conf_comment'];
				
				$delete_comment = "delete from temp_comment where `id-temp-comment`='$delete_id_comment' ";
				
				$run_delete_comment = mysqli_query($conn,$delete_comment);

		        //display message to user		
		        if($stmt)
		        {
					$Status = 0;
					$_SESSION["idbook"] = $idbook;
					$_SESSION["iduser"] = $iduser;
					// $_SESSION["status"] = $Status;
			
			        echo"<script>alert('دیدگاه مورد نظر به درستی تایید شد.')</script>";
			        echo"<script>window.open('../Send_email.php?id=.$Status','_self')</script>";
		        }
		}
		?>
	</body>
</html>
