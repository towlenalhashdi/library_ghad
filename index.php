<?php
require('dbconn.php');
?>


<!DOCTYPE html>
<html >

<!-- Head -->
<head>

	<title>نظام ادارة المكتبات </title>

	<!-- Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //Meta-Tags -->

	<!-- Style --> <link rel="stylesheet" href="css/style.css" type="text/css" media="all">

	<!-- Fonts -->
		<link href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
	<!-- //Fonts -->

</head>
<!-- //Head -->

<!-- Body -->
<body dir="rtl">

	<h1>نظام ادارة المكتبات</h1>

	<div class="container">

		<div class="login">
			<h2 >تسجيل دخول</h2>
			<form action="index.php" method="post">
				<input type="text" Name="RollNo" placeholder="رقم المستخدم" required="">
				<input type="password" Name="Password" placeholder="كلمة المرور" required="">
			
			
			<div class="send-button">
				<!--<form>-->
					<input type="submit" name="signin"; value="تسجيل دخول">
				</form>
			</div>
			
			<div class="clear"></div>
		</div>

		<div class="register">
			<h2>إنشاء حساب</h2>
			<form action="index.php" method="post">
				<input style="color:white;" type="text" Name="Name" placeholder="الاسم" required>
				<input type="text" Name="Email" placeholder="البريد الالكتروني" required>
				<input type="password" Name="Password" placeholder="كلمة المرور" required>
				<input type="text" Name="PhoneNumber" placeholder="رقم الهاتف" required>
				<input type="text" Name="RollNo" placeholder="رقم المستخدم" required="">
				
				<select name="Category" id="Category">
					<option value="عام">عام</option>
					<option value="ملاحظ">ملاحظ</option>
					<option value="طالب">طالب</option>
					<option value="باحث">باحث</option>
				</select>
				<br>
			
			
			<br>
			<div class="send-button">
			    <input type="submit" name="signup" value="إنشاء حساب">
			    </form>
			</div>
			<p><a class="underline" href=""></a></p>
			<div class="clear"></div>
		</div>

		<div class="clear"></div>

	</div>

	<div class="footer w3layouts agileits">
		<p>   تم تصميمه بواسطة فريق   كتابك في جهازك .حقوق النسخ محفوظة 2022&copy;  </a></p>
		
	</div>

<?php
if(isset($_POST['signin']))
{$u=$_POST['RollNo'];
 $p=$_POST['Password'];
 $c=$_POST['Category'];

 $sql="select * from LMS.user where RollNo='$u'";

 $result = $conn->query($sql);
$row = $result->fetch_assoc();
$x=$row['Password'];
$y=$row['Type'];
if(strcasecmp($x,$p)==0 && !empty($u) && !empty($p))
  {//echo "Login Successful";
   $_SESSION['RollNo']=$u;
   

  if($y=='Admin')
   header('location:admin/index.php');
  else
  	header('location:student/index.php');
        
  }
else 
 { echo "<script type='text/javascript'>alert('فشل تسجيل الدخول! كلمة المرور او رقم المستخدم غير صحيح')</script>";
}
   

}

if(isset($_POST['signup']))
{
	$name=$_POST['Name'];
	$email=$_POST['Email'];
	$password=$_POST['Password'];
	$mobno=$_POST['PhoneNumber'];
	$rollno=$_POST['RollNo'];
	$category=$_POST['Category'];
	$type='Student';

	$sql="insert into LMS.user (Name,Type,Category,RollNo,EmailId,MobNo,Password) values ('$name','$type','$category','$rollno','$email','$mobno','$password')";

	if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('تم انشاء حساب بنجاح')</script>";
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
echo "<script type='text/javascript'>alert('المستخدم موجود')</script>";
}
}

?>

</body>
<script>
function check(){
setInterval(function(){
    var storetime=sessionStorage.getItem("loginusertt");
    var storetim=sessionStorage.getItem("loginuserttt");
    timecompare(storetime,storetim);
    },20000);
    }
    function timecompare(tme,t){
        var currtime=new Date();
        var pasttime= new Date(tme);
        var pasttim= new Date(t);
        var timedif=currtime-pasttim;
        var mnpast=Math.floor((timedif/6000));
        var timediff=currtime-pasttime;
        var minpast=Math.floor((timediff/6000));
        if(minpast>1 && mnpast>1){
            window.location.href="logout.php";
        }
    }
    $(document).mousemove(function(){
var timestamp= new Date();
sessionStorage.setItem("loginusertt",timestamp);
});
$(document).keyup(function(){
var timestamp= new Date();
sessionStorage.setItem("loginuserttt",timestamp);
});
check();
</script>
<!-- //Body -->

</html>
