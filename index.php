<?php 
	session_start();
	//start (condition enter admin)
	// if(isset($_SESSION['admin_email'])){
	require('include/db.php');
?>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOOD BOOK</title>
</head>

<style>
    <?php include './styles/fonts.css';
          include './styles/style.css'; ?>
</style>

<body>
 <div class="main-content">
      <div class="aside">
	  <ul>
				<li><a href="../1.php" target="_blank"><h4>مشاهده سایت</h4></a></li>
				<li><a href="index.php?insert_pro"><h4>وارد کردن کتاب جدید</h4></a></li>
				<li><a href="index.php?view_pro"><h4>مشاهده تمامی کتاب‌ها</h4></a></li>
				<li><a href="index.php?view_comment"><h4>نظرات در انتظار تأیید</h4></a></li>
				<li><a href="index.php?view_customers"><h4>مشاهده ی لیست کاربران</h4></a></li>
				<li><a href="index.php?logout_admin"><h4>خروج</h4></a></li>
				
			</ul>
	  </div>
     <div class="main">
	 <?php 

	 		
			if(isset($_GET['MessageToAdmin']))
			{
				$message=$_GET['MessageToAdmin'];
				echo"<h1 class='message'>$message</h1>";
			}

			if(isset($_GET['insert_pro']))
			{
				include('./insert-book.php');
			}
			if(isset($_GET['view_pro']))
			{
				include('./view_books.php');
			}
			if(isset($_GET['edit_pro']))
			{
				include('./edit_book.php');
			}
			if(isset($_GET['delete_pro']))
			{
				include('./delete_book.php');
			}
			if(isset($_GET['view_customers']))
			{
				include('./view_user.php');
			}
			if(isset($_GET['view_comment']))
			{
				include('./view_comment.php');
			}
			if(isset($_GET['logout_admin']))
			{
				include('./logout_admin.php');
			}
		?>
	 </div>
</div>


</body>



</html>
<?php 
		//end( condition enter admin )
			
	// 	}else{
	
	// 	echo "
	// 	<html lang='fa'  dir='rtl'>
	// 	<head>
	// 	<meta http-equiv='Content-Type' content='text/html'; charset='utf-8' />
	// 	</head>";
		
	// 	echo "<script>window.open('login.php?not_admin=شما از مدیران سایت نیستید','_self')</script>";
	// }
?>