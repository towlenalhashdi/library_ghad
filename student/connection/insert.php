<?php
    include('DB.php');
    $notifications_name =  $_POST["RollNo"];
    $message            =  $_POST["message"];
    
    $insert_query = "INSERT INTO LMS.message(RollNo,message,active,Date,Time)VALUES('".$notifications_name."','".$message."','1',curdate(),curtime())";
    
    $result = mysqli_query($connection,$insert_query);
    
?>