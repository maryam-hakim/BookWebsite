<?php
 
 if(!isset($_SESSION)) 
 { 
	 session_start(); 
   
 } 

 $sql = "SELECT COUNT(text) FROM `temp_comment`";
 $result = mysqli_query($conn, $sql);
 $row=mysqli_fetch_array($result)

 ?>
 <table  width="100%" align="center" class="view-comment">
						  
      <caption ><b><?php echo $row[0] ?> نظر در انتظار تایید است</b></caption >
                                            
      <tr>
          <td align="center"><b> نام کاربری</b></td >
          <td align="center"><b>نام کتاب</b></td >
         <td align="center"><b> متن نظر</b></td >
                              
       </tr>
                          
       <tr align="center">

       <?php

         $sql = "SELECT * FROM `temp_comment`";
         $result = mysqli_query($conn, $sql);
         while($row=mysqli_fetch_array($result))
        {
          $sql = "SELECT `username` FROM `user` WHERE `iduser`= '".$row[1]."'";
          $resultt = mysqli_query($conn, $sql);
          while ($userrow = mysqli_fetch_array($resultt) ){
            $username = $userrow[0];
          }
           $sql = "SELECT `title` FROM `book` WHERE `idbook`= '".$row[2]."'";
           $resulttt = mysqli_query($conn, $sql);
           while($bookrow=mysqli_fetch_array($resulttt))
          {
            $bookname = $bookrow[0];
          }
          ?> 
          <td align="center"> <?php echo $username?></td >
          <td align="center"> <?php echo $bookname?> </td >
          <td align="center" class="comment-text" ><textarea> <?php echo $row[3]?></textarea> </td >
          <td align="center"><a href="./confirm_comment.php?conf_comment=<?php echo $row[0] ?>"class="vbtn">تایید</a></td >
          <td align="center"><a href="./delete_comment.php?delete_comment=<?php echo $row[0] ?>" class="vbtn">حذف </a></td >
          </tr>
      
        
          <?php } ?>              
     
   
