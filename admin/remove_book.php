<?php

require('dbconn.php');

    $bookid=$_GET['id'];
   
    $sql3="delete from LMS.book where BookId='$bookid'";
   
            if($conn->query($sql3) === TRUE)
            {
                    $sql4="delete from LMS.book where BookId='$bookid'";
                    $result=$conn->query($sql4);
                    echo "<script type='text/javascript'>alert('تم الحذف بنجاح')</script>";
                    header( "Refresh:0.01; url=book.php", true, 303);
            }
                    else
            {
                echo "<script type='text/javascript'>alert('خطأ')</script>";
               header( "Refresh:0.01; url=book.php", true, 303);
            }
   
        
   
        


?>

