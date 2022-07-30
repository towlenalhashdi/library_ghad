<?php
require('dbconn.php');

$id=$_GET['id'];

$roll=$_SESSION['RollNo'];

$sql="insert into LMS.return (RollNo,BookId) values ('$roll','$id')";

if($conn->query($sql) === TRUE)
{
echo "<script type='text/javascript'>alert('ارسال الطلب للمدير النظام.')</script>";
header( "Refresh:0.01; url=current.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('الطلب موجود مسبقاً..')</script>";
    header( "Refresh:0.01; url=current.php", true, 303);

}




?>