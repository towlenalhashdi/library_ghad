<?php
require('dbconn.php');

$bookid=$_GET['id1'];
$rollno=$_GET['id2'];

$sql="select Category from LMS.user where RollNo='$rollno'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

$category=$row['Category'];



if($category == 'GEN' || $category == 'OBC' || $category == 'SC'|| $category == 'ST' )
{$sql1="update LMS.record set Date_of_Issue=curdate(),Due_Date=date_add(curdate(),interval 3 day),Renewals_left=1 where BookId='$bookid' and RollNo='$rollno'";
 
if($conn->query($sql1) === TRUE)
{$sql3="update LMS.book set Availability=Availability-1 where BookId='$bookid'";
 $result=$conn->query($sql3);
 $sql5="insert into LMS.message (RollNo,Msg,active,Date,Time) values ('$rollno','طلبك لاستعارة الكتاب رقم: $bookid  تم قبوله', '1',curdate(),curtime())";
 $result=$conn->query($sql5);
echo "<script type='text/javascript'>alert('تم قبول الطلب بنجاح')</script>";
header( "Refresh:0.01; url=issue_requests.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('خطا عليك اعادة المحاولة')</script>";
    header( "Refresh:1; url=issue_requests.php", true, 303);

}
}
else
{$sql2="update LMS.record set Date_of_Issue=curdate(),Due_Date=date_add(curdate(),interval 180 day),Renewals_left=1 where BookId='$bookid' and RollNo='$rollno'";

if($conn->query($sql2) === TRUE)
{$sql4="update LMS.book set Availability=Availability-1 where BookId='$bookid'";
 $result=$conn->query($sql4);
 $sql6="insert into LMS.message (RollNo,Msg,active,Date,Time) values ('$rollno','طلبك لاستعارة الكتاب رقم: $bookid تم قبوله',  '1',curdate(),curtime())";
 $result=$conn->query($sql6);
echo "<script type='text/javascript'>alert('تم فبول الطلب بنجاح')</script>";
header( "Refresh:1; url=issue_requests.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('خطأ')</script>";
    header( "Refresh:1; url=issue_requests.php", true, 303);

}
}



?>