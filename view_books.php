<?php
include('./include/db.php');
?>
<style>
    <?php include './styles/fonts.css';
          include './styles/style.css'; ?>
</style>
<div class="view_book">
<table  width="100%" align="center">
						  
	<caption ><b>مشاهده ی اطلاعات تمامی محصولات</b></caption >
					  
	<tr>
		<td align="center"><b>شماره</b></td >
		<td align="center"><b>نام کتاب</b></td >
		<td align="center"><b>نام نویسنده</b></td >
		
	</tr>
	
	<tr align="center">
		<?php
		
			$select_pro="select * from book order by idbook desc limit 5";
			
			$run_pro=mysqli_query($conn,$select_pro);
			
			$i=0;
			
			while($row_pro=mysqli_fetch_array($run_pro))
			
			{
			
				$id_pro=$row_pro['idbook'];
				$title_pro=$row_pro['title'];
				$author_pro=$row_pro['author'];
				$i++;
			
		
		?>
		
		<td align="center"><?php echo $id_pro?></td >
		<td align="center"><?php echo $title_pro?></td >
		<td align="center"><?php echo $author_pro?></td >
		<td align="center"><a href="index.php?edit_pro=<?php echo $id_pro ?>"class="vbtn">ویرایش</a></td >
		<td align="center"><a href="./delete_book.php?delete_pro=<?php echo $id_pro ?>" class="vbtn">حذف </a></td >
	
	</tr>
<?php } ?>		

</table>
</div>