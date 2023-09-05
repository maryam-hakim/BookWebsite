<html lang="fa"  dir="rtl">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
		<?php 	
			
			include("./include/db.php");
			
			if(isset($_GET['delete_comment'])){
				
				$delete_id_comment = $_GET['delete_comment'];
				
				$delete_comment = "delete from temp_comment where `id-temp-comment`='$delete_id_comment' ";
				
				$run_delete_comment = mysqli_query($conn,$delete_comment);
				
				if($run_delete_comment)
				{
					
					echo "<script>window.open('index.php?view_comment','_self')</script>";
					
				}
			}
		?>
	</body>
</html>