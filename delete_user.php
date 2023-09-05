<html lang="fa"  dir="rtl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
    include("include/db.php");
	if(isset($_GET['delete_customer'])){
		$delete_id_customer=$_GET['delete_customer'];
		$delete_customer="delete from user where iduser='$delete_id_customer' ";
		$run_delete_customer=mysqli_query($conn,$delete_customer);
		if($run_delete_customer)
		{
			echo "<script>alert('این مشتری از میان مشتریان شما حذف شد.')</script>";
			echo "<script>window.open('index.php?view_customers','_self')</script>";
		}
	}
?>
</body>
</html>
