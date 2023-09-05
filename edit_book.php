<form method="post" action="" enctype="multipart/form-data">
	
	<?php
		
		if(isset($_GET['edit_pro'])){
			
			$id_pro=$_GET['edit_pro'];
			
			$select_pro="select * from book where idbook='$id_pro' ";
			
			$run_pro=mysqli_query($conn,$select_pro);
			
			$row_pro=mysqli_fetch_array($run_pro);
			
			$title_pro=$row_pro['title'];
			
			$author=$row_pro['author'];
			
			$brief=$row_pro['brief'];
			
		
			
		}			
		
	?>
	<table  width="100%" align="center" class="edit_book">
		
		<caption ><b>کتاب مورد نظر خود را اصلاح و ویرایش نمایید.</b></caption >
		
		<tr>
			<th ><b>ویژگی های محصول</b></th >
			<th ><b>مقدار ورودی برای هر کدام از ویژگی ها</b></th >
		</tr>
		
		<tr>
			<td align="center"><b>نام محصول</b></td >
			<td align="center"><input type="text" name="product_title" size="70" value="<?php echo $title_pro; ?>"></td >
		</tr>
		
		
		
		<tr>
			<td align="center"><b>نام نویسنده</b></td >
			<td align="center"><input type="text" name="author" value="<?php echo $author; ?>"></td >
		</tr>
		
		
		<tr>
			<td align="center"><b>توصیف کتاب</b></td >
			<td align="center">
				<textarea name="product_desc" ><?php echo $brief; ?></textarea>
			</td >
		</tr>
		
		
		<tr>
			<td align="center"><input class="btn" type="submit" name="submit" value="به روز رسانی"></td >
			<td align="center"><input class="btn" type="reset" name="reset" value="ریست کردن"></td >
		</tr>
		
	</table > 
</form>
<?php
	if(isset($_POST['submit']))
	{
		
		$id_pro=$_GET['edit_pro'];
				
		//getting the text data form the fields
		
		$product_title		=$_POST['product_title'];
		$product_author		=$_POST['author'];
		$product_desc		=$_POST['product_desc'];
		
		
		
		
		$update_product="UPDATE book SET 	
		title='$product_title',	
		author='$product_author',	
		brief='$product_desc' where idbook='$id_pro'";	
		
		
		$update_pro=mysqli_query($conn,$update_product);
		//display message to user		
		if($update_pro)
		{
			echo"<script>alert('اطلاعات جدید جایگزین اطلاعات قبلی شد.')</script>";
			echo"<script>window.open('index.php?view_pro','_self')</script>";
		}
		
	}
	
?>