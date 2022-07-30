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
<?php 
if ($_SESSION['RollNo']) {
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
            <style>
         .round{
            width: 20px;
            height: 20px;
            border-radius: 50%;
            position: relative;
            background: red;
            display: inline-block;
            padding: 0.3rem 0.2rem !important;
            font-size: 16px;
            z-index: 99 !important
          }
      </style>
             <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">


<link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">


<link href="dist/css/sticky-footer-navbar.css" rel="stylesheet">



<script src="assets/js/ie-emulation-modes-warning.js"></script>


    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php" style="float:right;margin-right:-35px"> نظام إدارة المكتبات <img src="../images/logo.png" width="60px" height="60px">  </a> 
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
        <nav aria-label="breadcrumb" style="margin-top: -30px;margin-left: 30px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="color:#1e7594;"href="index.php">الرئيسية/</a></li>
                <li class="breadcrumb-item active" aria-current="book.php">كافة كتاب</li>
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
                                 
                                 الرسائل<i class="menu-icon icon-inbox"></i></a>
                                </li>
                                <li><a href="student.php">ادارة الطلاب<i class="menu-icon icon-user"></i> </a>
                                </li>
                                <li><a href="book.php">كافة الكتب<i class="menu-icon icon-book"></i> </a></li>
                                <li><a href="addbook.php">إضافة كتاب <i class="menu-icon icon-edit"></i></a></li>
                                <li><a href="requests.php">طلبات الاعارة / الارجاع <i class="menu-icon icon-tasks"></i></a></li>
                                <li><a href="recommendations.php"> توصيات الكتب  <i class="menu-icon icon-list"></i></a></li>
                                <li><a href="current.php">الكتب المستعارة حالياً <i class="menu-icon icon-list"></i></a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li><a href="logout.php">تسجيل خروج<i class="menu-icon icon-signout"></i> </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>



                    <div style="margin-left: 25px;margin-bottom: -35px;">  

                        <form method="post" action="data-print.php" target="_new" class="form-inline">
                            <div class="form-group">
                            <button type="submit" name="print" class="btn btn-primary">طبـــاعة</button>
                            </div>
                            </form>
                        </div>

                    <div class="span9" style="float:left;margin-left:-1px;">
          
                  <form class="form-horizontal row-fluid" action="book.php" method="post">
                                        <div class="control-group">
                                            <label class="control-label"style="margin-right:160px;margin-bottom:-30px;" for="Search"><b>البحـــث</b></label>
                                            <div class="controls">
                                                <input type="text" id="title" name="title" style="text-align:right" placeholder="ادخل الاسم/رقم الكتاب" class="span8" required>
                                                <button type="submit" name="submit"class="btn" style="margin-left: -530px;">بحـــث</button>
                                                
                                               
                                              
                                            </div>
                                        </div>
                                    </form>
                                    <br>
                    
                                    <?php
                                    if(isset($_POST['submit']))
                                        {$s=$_POST['title'];
                                            $sql="select * from LMS.book where BookId='$s' or Title like '%$s%'";
                                        }
                                    else
                                        $sql="select * from LMS.book";

                                    $result=$conn->query($sql);
                                    $rowcount=mysqli_num_rows($result);

                                    if(!($rowcount))
                                        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                                    else
                                    {

                                    
                                    ?>
                        <table class="table" id = "tables"  dir="rtl">
                                  <thead style="text-align:center" >
                                    <tr>
                                      <th>رقم الكتاب</th>
                                      <th>اسم الكتاب</th>
                                      <th>الكتب المتوفرة </th>
                                      <th ></th>
                                    </tr>
                                  </thead>
                                  <tbody style="text-align:right" >
                                    <?php
                            
                            //$result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $bookid=$row['BookId'];
                                $name=$row['Title'];
                                $avail=$row['Availability'];
                            
                           
                            ?>
                                    <tr>
                                      <td><?php echo $bookid ?></td>
                                      <td><?php echo $name ?></td>
                                      <td><?php if($avail > 0)
                                                  echo "<font color='green'>".$avail."</font>";
                                                else
                                                  echo "<font color='red'>0</font>";
                                              ?>
                                        <td><center>
                                            <a href="bookdetails.php?id=<?php echo $bookid; ?>"  style="color: #337ab7;background-color:white;  border-color:#337ab7;"class="btn btn-success" >تفاصيل</a>
                                            <a href="edit_book_details.php?id=<?php echo $bookid; ?>" class="btn btn-primary" >تعديل</a>
                                            <a href="remove_book.php?id=<?php echo $bookid; ?>"  style="color:red;background-color:white;  border-color:#337ab7;" class="btn btn-danger">حـذف</a>
                                        </center></td>
                                    </tr>
                               <?php }} ?>
                               </tbody>
                                </table>
                            </div>
                    <!--/.span9-->
    
  


                </div>
            </div>
            <!--/.container-->
        </div>
<div class="footer">
            <div class="container">
            <b class="copyright m-0 py-4 text-center" class="">&copy; 2022 نظام ادارة المكتبات </b>حقوق النسخ محفوظة.
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


        
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
      
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


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>