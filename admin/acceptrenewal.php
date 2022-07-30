<?php
require('dbconn.php');

$bookid=$_GET['id1'];
$rollno=$_GET['id2'];

$sql="select Category from LMS.user where RollNo='$rollno'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

$category=$row['Category'];



if($category == 'GEN' || $category == 'OBC' )
{$sql1="update LMS.record set Due_Date=date_add(Due_Date,interval 3 day),Renewals_left=0 where BookId='$bookid' and RollNo='$rollno'";
 
if($conn->query($sql1) === TRUE)
{$sql3="delete from LMS.renew where BookId='$bookid' and RollNo='$rollno'";
 $result=$conn->query($sql3);
 
 $sql5="insert into LMS.message (RollNo,Msg,active,Date,Time) values ('$rollno','طلبك للتجديد اعارة الكتاب رقم: $bookid  تم قبوله', '1',curdate(),curtime())";
 $result=$conn->query($sql5);
echo "<script type='text/javascript'>alert('تم فبول الطلب بنجاح')</script>";
header( "Refresh:0.01; url=renew_requests.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('خطأ')</script>";
    header( "Refresh:0.01; url=renew_requests.php", true, 303);

}
}
else
{$sql2="update LMS.record set Due_Date=date_add(Due_Date,interval 3 day),Renewals_left=0 where BookId='$bookid' and RollNo='$rollno'";

if($conn->query($sql2) === TRUE)
{$sql4="delete from LMS.renew where BookId='$bookid' and RollNo='$rollno'";
 $result=$conn->query($sql4);
 $sql6="insert into LMS.message (RollNo,Msg,active,Date,Time) values ('$rollno','طلبك للتجديد اعارة الكتاب رقم: $bookid  تم قبوله', '1',curdate(),curtime())";
 $result=$conn->query($sql6);
echo "<script type='text/javascript'>alert('تم قبول الطلب بنجاح')</script>";
header( "Refresh:0.01; url=renew_requests.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('خطأ')</script>";
    header( "Refresh:0.01; url=renew_requests.php", true, 303);

}
}



?>