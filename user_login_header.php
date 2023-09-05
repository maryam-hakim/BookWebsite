<?php
 
 if(!isset($_SESSION)) 
 { 
	 session_start(); 
 } 
 ?>
 <style>
<?php
 include './user_login.css';
 include './fonts.css';
?>
</style>

<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<head>


<body>
  <form method="post" action="">
  <div class="login-div">
    <div class="title">ورود</div>
    <div class="fields">
      <div class="username">
        <svg class="svg-icon" viewBox="0 0 20 20">
          <path
            d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z">
          </path>
        </svg>
        <input type="username" class="user-input" placeholder="Username" name="username">
      </div>
      <span class="username-msg"></span>
      <div class="password">
        <svg class="svg-icon" viewBox="0 0 20 20">
          <path
            d="M17.308,7.564h-1.993c0-2.929-2.385-5.314-5.314-5.314S4.686,4.635,4.686,7.564H2.693c-0.244,0-0.443,0.2-0.443,0.443v9.3c0,0.243,0.199,0.442,0.443,0.442h14.615c0.243,0,0.442-0.199,0.442-0.442v-9.3C17.75,7.764,17.551,7.564,17.308,7.564 M10,3.136c2.442,0,4.43,1.986,4.43,4.428H5.571C5.571,5.122,7.558,3.136,10,3.136 M16.865,16.864H3.136V8.45h13.729V16.864z M10,10.664c-0.854,0-1.55,0.696-1.55,1.551c0,0.699,0.467,1.292,1.107,1.485v0.95c0,0.243,0.2,0.442,0.443,0.442s0.443-0.199,0.443-0.442V13.7c0.64-0.193,1.106-0.786,1.106-1.485C11.55,11.36,10.854,10.664,10,10.664 M10,12.878c-0.366,0-0.664-0.298-0.664-0.663c0-0.366,0.298-0.665,0.664-0.665c0.365,0,0.664,0.299,0.664,0.665C10.664,12.58,10.365,12.878,10,12.878">
          </path>
        </svg>
        <input type="password" class="pass-input" placeholder="Password" name="password">
      </div>
      <span class="password-msg"></span>
    </div>
    <input name="send_U_P" class="signin-button" type="submit" value="وارد شوید" />
    <div class="register" dir="rtl">
     <p> عضو نیستید؟</p>
     <a href="./register.php">ثبت نام کنید</a>
    </div>
    <span class="signin-status"></span>
  </div>
</form>

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
		if(isset($_POST['send_U_P']))
		{
			// receive username value from the form 
			$c_username_no_empty = mysqli_real_escape_string($conn ,$_POST['username']);
			// receive password value from the form
			$c_password_1_validate=mysqli_real_escape_string($conn ,$_POST['password']);
			
			if (empty($c_username_no_empty)) 
			{
				if (empty($c_password_1_validate)) 
				{
					echo "<script>alert('نام کاربری و پسورد خود را وارد نکرده اید!!! آنها را وارد کنید!!!.')</script>";
					}else{
					echo "<script>alert('نام کاربری خود را وارد نکرده ایید !!! آن را وارد نمایید.')</script>";
				}	
				}else{
				if (empty($c_password_1_validate)){
					echo "<script>alert('پسورد خود را وارد نکرده ایید آن را وارد نمایید!!!')</script>";
					}else{
					$c_username_validate=$c_username_no_empty;
						if(preg_match("/^(?=.*[A-z])(?=.*[0-9])\S{6,12}$/", $c_password_1_validate))
						{
							// email is valid
							$c_username=$c_username_validate;
							// password is valid
							$c_pass = $c_password_1_validate;
							
							}else{
							echo "<script>alert('پسورد شما طبق الگو نمی باشد!!! پسورد صحیحی وارد نمایید.')</script>";
						}
						}
				}
		}	
        if((isset($c_pass)) and (isset($c_username)))
			{
				$run_hashed = "select password from user where `username`='$c_username' ";
				$hashed_password = mysqli_query($conn,"SET NAMES utf8");
				$hashed_password = mysqli_query($conn,"SET CHARACTER SET utf8");
				$hashed_password =  mysqli_query($conn,$run_hashed);
				while ($row = mysqli_fetch_array($hashed_password) ){
					$hash_password = $row[0];
				}
				
				if(password_verify($c_pass, $hash_password )){
					
                    $sel_login = "select * from user where `username`='$c_username' ";
					$run_login = mysqli_query($conn,"SET NAMES utf8");
					$run_login = mysqli_query($conn,"SET CHARACTER SET utf8");
					$run_login = mysqli_query($conn,$sel_login);
					
					while($run_customer_login=@mysqli_fetch_array($run_login))
					{
						$_SESSION["username"] =	$run_customer_login['username'];
						
						
						$_SESSION["email"] =	$run_customer_login['email'];
						
					}
                    echo "<script>window.open('1.php','_self')</script>";
        // }
	}else{
		echo "<script>alert('نام کاربری و یا رمز عبور خود را اشتباه وارد کرده اید ، لطفا دوباره امتحان کنید!')</script>";
					
	}

	
      }
      ?>

 
</body>


</html>