<?php
	
	session_start();
	
	unset($_SESSION['username']);
	
	echo "<script>window.open('1.php','_self')</script>";

?>