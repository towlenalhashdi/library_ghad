<?php

require('dbconn.php');

    $rollno=$_GET['id'];
   
    $sql3="delete from LMS.user where RollNo='$rollno'";
   
            if($conn->query($sql3) === TRUE)
            {
                    $sql4="delete from LMS.user where RollNo='$rollno'";
                    $result=$conn->query($sql4);
                    echo "<script type='text/javascript'>alert('تم الحذف بنجاح')</script>";
                    header( "Refresh:0.01; url=student.php", true, 303);
            }
                    else
            {
                echo "<script type='text/javascript'>alert('خطأ')</script>";
               header( "Refresh:0.01; url=student.php", true, 303);
            }
   
        
   
        


?>

