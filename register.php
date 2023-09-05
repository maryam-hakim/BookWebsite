<?php include ('./server.php'); ?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<head>
<body dir=rtl>
  
<style>
<?php include './register.css';
      include './fonts.css';
  ?>
</style>

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
?>


    <body>
    <?php include './errors.php';?>
        <div class="register">
        
        <form action="/web/register.php" method="post" enctype="multipart/form-data" >
        
         
            <h2 >عضویت</h2>
            <div class="name-field fields">
                <label for="name-filed">نام</label>
                <input type="text" name="name-field" value="<?php echo $c_name; ?>" />
            </div>
            <div class="lastname-field fields">
                <label for="lastname-field">نام‌خانوادگی</label>
                <input type="text" name="lastname-field" value="<?php echo $c_lastname; ?>">
            </div>
            <div class="phone-field fields">
                <label for="phone-field">تلفن‌همراه</label>
                <input type="tel" name="phone-field" value="<?php echo $c_phone; ?>">
            </div>
            <div class="email-field fields">
                <label for="email-field">ایمیل</label>
                <input type="email" name="email-field" value="<?php echo $c_email; ?>">
            </div>
            <div class="username-field fields">
                <label for="username-field">نام ‌کاربری</label>
                <input type="text" name="username-field" value="<?php echo $c_username; ?>">
            </div>
            <div class="password-field fields">
            <div class="header-lable">
                <label for="password-field">رمز عبور</label>
                <div class="tooltip">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16" 
                id="IconChangeColor"> <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z" id="mainIconPathAttribute" fill="#737373"></path> </svg>
							<span class="tooltiptext">•	پسورد شما باید حداقل 6 کاراکتر و حداکثر 12 کاراکتر باشد.<br><br>
                                •	در پسورد خود حتما باید از ارقام 0تا 9 استفاده کنید.<br><br>
                                •	در پسورد خود از حروف بزرگ  یا کوچک انگلیسی استفاده کنید.<br><br>

							</span>
				</div>
            </div>
                <input type="password" name="password-field" id="myInput_1" value="<?php echo $c_password_1; ?>">
                </div>
            <div class="2ndpassword-field fields">
                <label for="2ndpassword-field">تأیید رمز عبور</label>
                <input type="password" name="2ndpassword-field" id="myInput_2">
            </div>
            <input type="submit" name= "submit" value="ثبت نام" class="register-submit fields">
            
            
    </form>
        </div>

        <?php
        if($c_check === "1"){
        $hashed_password = password_hash($c_password_1, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO user (name, lastname, mobile, username, password, email) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $c_name, $c_lastname, $c_phone, $c_username, $hashed_password, $c_email);
        $stmt->execute();
         $stmt->close();
         echo "<script>alert('ثبت نام شما با موفقیت انجام شد')</script>";
         echo "<script>window.open('./1.php','_self')</script>";
        }
       ?>
        




</body>
</html>