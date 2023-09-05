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
	// initializing variables
	$c_name = "";
	$c_lastname    = "";
	$c_phone    = "";
    $c_email    = "";
    $c_username    = "";
	$c_password_1 = "";
	$errors = array(); 
	$c_check= "0";
	
	// REGISTER USER
	if(isset($_POST['submit']) && !empty($_POST['submit'])) { 
		// receive all input values from the form
		// form validation: ensure that the form is correctly filled ...
		// by adding (array_push()) corresponding error unto $errors array
    
		// receive name value from the form
		$c_name = mysqli_real_escape_string($conn , $_POST['name-field']);
		if (empty($c_name)) { array_push($errors, "نام خود را وارد کنید!"); }
		
		// receive lastname value from the form
		$c_lastname = mysqli_real_escape_string($conn ,$_POST['lastname-field']);
		if (empty($c_lastname)) { array_push($errors, "نام خانوادگی خود را وارد کنید!"); }
		
		// receive gender value from the form
		$c_username = mysqli_real_escape_string($conn ,$_POST['username-field']);
		if (empty($c_username)) {
			 array_push($errors, "نام کاربری خود را وارد کنید!");}
		$sql_u = "SELECT * FROM user WHERE username='$c_username'";
		$res_u = mysqli_query($conn, $sql_u);
		if (mysqli_num_rows($res_u) > 0) {
			array_push($errors, "این نام کاربری قبلا استفاده شده‌است.");}
			

         // receive email value from the form and validation email value
		$c_email_no_empty = mysqli_real_escape_string($conn ,$_POST['email-field']);
		if (empty($c_email_no_empty)) 
		{
			array_push($errors, "ایمیل خود را وارد کنید!"); 
			}else{
			$c_email_validate=$c_email_no_empty;
			if(filter_var($c_email_validate,FILTER_VALIDATE_EMAIL) == true){
				$c_email=$c_email_validate;
				}else{
				array_push($errors, "ایمیل نادرستی  وارد کرده‌اید!!! ایمیل درستی وارد کنید.");
			}
		}

        // receive phone value from the form and validation phone value
		$c_phone_validate=mysqli_real_escape_string($conn ,$_POST['phone-field']);
		if (empty($c_phone_validate)) 
		{
			array_push($errors, "شماره تلفن خود را وارد کنید!"); 
			}else{
			if(preg_match("/^[0]{1}[9]{1}\d{9}$/", $c_phone_validate))
			{
				// phone is valid
				$c_phone=$c_phone_validate;
				}else{
				array_push($errors, "شماره تلفنی که وارد کردید صحیح نمی‌باشد!!!");
			} 
		}

        
		// receive password value from the form and validation password value
		$c_password_1_validate=mysqli_real_escape_string($conn ,$_POST['password-field']);
		if (empty($c_password_1_validate)) 
		{
			array_push($errors, "رمز عبور خود را وارد کنید!"); 
			}else{
			if(preg_match("/^(?=.*[A-z])(?=.*[0-9])\S{6,12}$/", $c_password_1_validate))
			{
				// phone is valid
				$c_password_1 = $c_password_1_validate;
				}else{
				array_push($errors, "رمز عبوری که وارد کرده‌اید، طبق الگو نیست. دوباره رمز عبور را وارد نمایید!!!");
			} 
		}
		$c_password_2 =mysqli_real_escape_string($conn ,$_POST['2ndpassword-field']);
		if (empty($c_password_2)){array_push($errors, "پسورد دوم را وارد نکرده اید!");}
		
		if((!empty($c_password_1_validate))&&(!empty($c_password_2)))
		{
			
			if ($c_password_1 != $c_password_2)
			{
				array_push($errors, "پسوردهای وارد شده یکسان نیستند!");
			}
		}

		

		}
		if($c_name && $c_lastname && $c_phone && $c_username && $c_password_1 && $c_email){
			$c_check = "1";
		}
?>