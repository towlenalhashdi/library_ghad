<?php
require('dbconn.php');
?>
 
                              
<?php
      $rollno=$_SESSION['RollNo'];
       $find_notifications = "Select * from LMS.message where RollNo='$rollno' and active = 1 order by Date DESC,Time DESC";
       $result = mysqli_query($conn,$find_notifications);
       $count_active = '';
       $notifications_data = array(); 
       $deactive_notifications_dump = array();
        while($rows = mysqli_fetch_assoc($result)){
                $count_active = mysqli_num_rows($result);
                $notifications_data[] = array(
                            "M_Id" => $rows['M_Id'],
                            "RollNo"=>$rows['RollNo'],
                            "Message"=>$rows['Msg']
                );
        }
        //only five specific posts
        $deactive_notifications = "Select * from LMS.message where active = 0 ORDER BY M_id DESC LIMIT 0,5";
        $result = mysqli_query($conn,$deactive_notifications);
        while($rows = mysqli_fetch_assoc($result)){
          $deactive_notifications_dump[] = array(
                      "M_Id" => $rows['M_Id'],
                      "RollNo"=>$rows['RollNo'],
                      "Message"=>$rows['Msg']
          );
        }

     ?>
<!DOCTYPE html>
<html >

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>نظام ادارة المكتبات </title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <style>
         .round{
          width:15px;
          height:15px;
          border-radius:50%;
          position:relative;
          background:red;
          display:inline-block;
          padding:0.3rem 0.2rem !important;
        font-size:18px;
          z-index: 99 !important;
          }
      </style>
    </head>
    <body>
    <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php" style="float:right;margin-right:-20px"> نظام إدارة المكتبات  <img src="../images/logo.png" width="60px" height="60px"> </a> 
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-left">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu" style="text-align:center;">
                                    <li><a href="index.php">البروفايل</a></li>
                                    <!--li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Account Settings</a></li-->
                                    <li class="divider"></li>
                                    <li><a href="logout.php">تسجيل خروج</a></li>
                                </ul>
                            </li>
                        </ul>
                       
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
        <nav aria-label="breadcrumb" style="margin-top: -30px;margin-left: 30px;float: left;">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a style="color:#1e7594;"href="../index.php">تسجيل دخول/ انشاء حساب /</a></li>
                <li class="breadcrumb-item active" aria-current="index.php">الرئيسية </li>
                
            </ol>

        </nav>
            <div class="container">
                <div class="row">
                    <div class="span3" style="float:right;text-align:right">
                        <div class="sidebar">
                        <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="index.php">الرئيسية<i class="menu-icon icon-home"></i>
                                </a></li>
                                 <li><a href="message.php">
                                 <?php if($count_active > 0)
                                              echo "<font class=\"round\"color=\"white\">$count_active</font>";
                                            else
                                                echo "<font class=\"round\">  0 $count_active</font>"; 
                                        ?>
                                 الرسائل<i class="menu-icon icon-inbox"></i></a>
                                </li>
                                <li><a href="book.php">كافة الكتب<i class="menu-icon icon-book"></i> </a></li>
                                <li><a href="history.php">الكتب المستعارة سابقاً<i class="menu-icon icon-tasks"></i> </a></li>
                                <li><a href="recommendations.php">توصية الكتاب<i class="menu-icon icon-list"></i> </a></li>
                                <li><a href="current.php">الكتب المستعارة حالياً <i class="menu-icon icon-list"></i></a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li><a href="logout.php">تسجيل خروج<i class="menu-icon icon-signout"></i> </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                    	<center>
                           	<div class="card" style="width: 50%;" > 
                    			<img class="card-img-top" src="images/profile2.png" alt="Card image cap">
                    			<div class="card-body">

                                <?php
                                $rollno = $_SESSION['RollNo'];
                                $sql="select * from LMS.user where RollNo='$rollno'";
                                $result=$conn->query($sql);
                                $row=$result->fetch_assoc();

                                $name=$row['Name'];
                                $category=$row['Category'];
                                $email=$row['EmailId'];
                                $mobno=$row['MobNo'];
                                ?>    
                    				<i style="text-align:right;">
                    				<h1 class="card-title"><center><?php echo $name ?></center></h1>
                    				<br>
                    				<p><?php echo $email ?><b>:البريد الالكتروني </b></p>
                    				<br>
                    				<p><?php echo $rollno ?><b>:رقم المستخدم </B></p>
                    				<br>
                    				<p><b> الصنف: </b><?php echo $category ?></p>
                    				<br>
                    				<p><?php echo $mobno ?><b>: رقم الجوال</b></p>
                    				</b>
                                </i>

                    			</div>
                    		</div>
                            <br>
                            <a href="edit_student_details.php" class="btn btn-primary">تعديل التفاصيل</a>    
      					</center>              	
                    </div>
                    
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
<div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2022 نظام ادارة المكتبات </b>حقوق النسخ محفوظة.
            </div>
        </div>
        
        <!--/.wrapper-->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
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
    </body>
   

</html>