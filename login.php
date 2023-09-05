<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>صفحه ی ورود مدیریت</title>
		<link rel="stylesheet" href="styles/login.css">
        <link rel="stylesheet" href="styles/fonts.css">

	</head>
    <style>
    <?php include('./styles/fonts.css');
?>
    </style>
    
    <body>
		
		<div class="login">
        <h2>
				<?php 
					if(isset($_GET['not_admin']))
					{echo $_GET['not_admin'];}
				?>
		</h2>
			
			<h1>ورود به مدیریت سایت</h1>
			<form method="post">
				<input type="text" name="loginEmail" placeholder="لطفا ایمیل خود را وارد نمایید" required="required" />
				<input type="password" name="loginPass" placeholder="لطفا پسورد خود را وارد نمایید" required="required" />
				<button type="submit" name="login" class="btn btn-primary btn-block btn-large">ادامه</button>
			</form>
		</div>
	</body>
</html>

<?php
    
	session_start();
	
	require('include/db.php');

	if(isset($_POST['login'])){
	
		$email=  mysqli_real_escape_string($conn , $_POST['loginEmail']);
		
		$pass=  mysqli_real_escape_string($conn , $_POST['loginPass']);
		
		$sel_admin	=	"select * from admin where admin_email='$email' AND admin_pass='$pass'";
		
		$run_admin	=	mysqli_query($conn,$sel_admin);
		
		$check_admin	=	mysqli_num_rows($run_admin);
		
		if($check_admin==0){
		
			echo "<script>alert('نام کاربری و رمز عبور خود را اشتباه وارد کرده اید ، لطفا دوباره امتحان کنید.')</script>";
		
		}else{
			
			$_SESSION['admin_email'] = $email;
			
			echo "<script>window.open('index.php?MessageToAdmin=سلام مدیر محترم، مقدمتان گلباران. موفق باشید.','_self')</script>";
		
		}
	
	}
?>