<table  width="100%" align="center" class="view_user">
<caption ><b>مشاهده ی همه کاربران</b></caption >
	<tr>
    <td align="center"><b>شماره کاربری</b></td >
    <td colspan="2" align="center"><b>  نام و نام خانوادگی </b></td >
    <td colspan="2" align="center"><b>ایمیل</b></td >
    <td colspan="2" align="center"><b> شماره تلفن</b></td >
	<td align="center"><b>نام کاربری</b></td >		
	<td align="center"><b>حذف</b></td >
	</tr>
	<tr align="center">
		<?php
			$select_customer="select * from user ";
			$run_customer=mysqli_query($conn,$select_customer);
			while($row_customer=mysqli_fetch_array($run_customer))
			{
				$id_customer=$row_customer['iduser'];
				$customer_name=$row_customer['name'];
				$customer_lastname=$row_customer['lastname'];
				$email_customer=$row_customer['email'];
				$customer_phone=$row_customer['mobile'];
                $customer_username=$row_customer['username'];
		?>
        <td align="center" ><?php echo $id_customer?></td >
		<td align="center" colspan="2"><?php echo $customer_name." ".$customer_lastname?></td >
		<td align="center" colspan="2"><?php echo $email_customer?></td >
        <td align="center" colspan="2"><?php echo $customer_phone?></td >
        <td align="center"><?php echo $customer_username?></td >
		<td align="center"><a href="./delete_user.php?delete_customer=<?php echo $id_customer ?>">حذف </a></td >
	</tr>
<?php } ?>		
</table>