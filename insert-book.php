<!DOCTYPE html>
<html lang="fa"  dir="rtl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<?php
include('./include/db.php');
?>
<style>
    <?php include './styles/fonts.css';
          include './styles/style.css'; ?>
</style>
<body>

<!-- <h2 id="insert-book-title"><b>اطلاعات مربوط به کتاب را در این جدول اضافه کنید</b></h2> -->
<div class="insert-book-form">
<form  method="post" action="" enctype="multipart/form-data">
	<table  width="500" align="center">
						  
		
					  
		<tr>
			<th ><b>ویژگی های کتاب</b></th >
			<th ><b>مقدار ورودی برای هر کدام از ویژگی ها</b></th >
		</tr>
					
		<tr>
			<td><b>نام کتاب</b></td >
			<td><input type="text" name="product_title" size="70" required></td >
		</tr>

		<tr>
			<td><b>نام نویسنده</b></td >
			<td><input type="text" name="author_name" size="70" required></td >
		</tr>

	
		<tr>
			<td><b>معرفی کتاب</b></td >
			<td>
				<textarea name="product_desc" ></textarea>
			</td >
		</tr>

					
		<!-- <tr>
			<td><b>عکس کتاب</b></td >
			<td><input type="file" name="product_image" required></td >
		</tr> -->

	</table > 
	<input type="submit" name="Submit" value="بارگذاری" class="btn">
	<input type="reset" name="reset" value="ریست کردن" class="btn">
</form>
<?php
// define variables and set to empty values

if(isset($_POST['Submit']) && !empty($_POST['Submit']))
	{
    		
			$product_title = $_POST["product_title"];
			$product_desc = $_POST["product_desc"];
			$author_name = $_POST["author_name"];
			
					
		//getting the image form the image fields
		// $product_image_name	=$_FILES['product_image']['name'];
		// $product_image_tmp	=$_FILES['product_image']['tmp_name'];
		// $address_images='./product_images/'.$product_image_name;
		// move_uploaded_file($product_image_tmp,$address_images);
			
		$stmt = $conn->prepare("INSERT INTO book (title, author, brief) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $product_title, $author_name , $product_desc);
        $stmt->execute();
        echo "New records created successfully";

        $stmt->close();

		//display message to user		
		if($stmt)
		{
			echo"<script>alert('تبریک...داده های مربوط به محصول شما به درستی وارد شد.')</script>";
			echo"<script>window.open('./index.php?insert_pro','_self')</script>";
		}
			

	}
?>
</div>



</body>
</html>