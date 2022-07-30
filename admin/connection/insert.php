<?php
    include('DB.php');
    $notifications_name =  $_POST["RollNo"];
    $message            =  $_POST["message"];

    $insert_query = "INSERT INTO LMS.message(RollNo,message,active,Date,Time)VALUES('".$notifications_name.",curdate(),curtime()','".$message."','1')";
    
    $result = mysqli_query($connection,$insert_query);
    
?>