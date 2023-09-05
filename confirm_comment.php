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
                echo "New records created successfully";

                $stmt->close();

                $delete_id_comment = $_GET['conf_comment'];
				
				$delete_comment = "delete from temp_comment where `id-temp-comment`='$delete_id_comment' ";
				
				$run_delete_comment = mysqli_query($conn,$delete_comment);

		        //display message to user		
		        if($stmt)
		        {
			        echo"<script>alert('دیدگاه مورد نظر به درستی تایید شد.')</script>";
			        echo"<script>window.open('./index.php?view_comment','_self')</script>";
		        }
		}
		?>
	</body>
</html>