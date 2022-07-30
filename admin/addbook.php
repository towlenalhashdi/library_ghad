<<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo']) {
    ?>

<!DOCTYPE html>
<html lang="en">

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
                <li class="breadcrumb-item active" aria-current="addbook.php">إضافة كتاب</li>
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
                    <!--/.span3-->
                    <!--/.span9-->
                    <div class="span9" style="text-align:right; width: 870px;">
                    <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h3>إضافة كتاب</h3>
                            </div>
                            <div class="module-body" style="text-align:left;">

                                    
                                    <br >

                                    <form class="form-horizontal row-fluid" action="addbook.php" method="post" enctype="multipart/form-data">
                                        <div class="control-group">
                                            <label class="control-label"style="text-align:left;margin-right:15px;" for="Title"><b> عنوان الكتاب</b></label>
                                            <div class="controls">
                                                <input type="text" id="title" style="text-align:right;margin-right:50px;" name="title" placeholder="عتوان الكتاب" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"style="text-align:left;margin-right:15px;" for="Author"><b>المؤلف</b></label>
                                            <div class="controls">
                                                <input  style="text-align:right;margin-right:50px;" type="text" id="author1" name="author1" class="span8" required>
                                                <input style="text-align:right;margin-right:50px;" type="text" id="author2" name="author2" class="span8">
                                                <input  style="text-align:right;margin-right:50px;"type="text" id="author3" name="author3" class="span8">

                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"style="text-align:left;margin-right:15px;" for="Publisher"><b>الناشر</b></label>
                                            <div class="controls">
                                                <input type="text" id="publisher"style="text-align:right;margin-right:50px;"  name="publisher" placeholder="الناشر" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label"style="text-align:left;margin-right:15px;" for="Year"><b>سنة النشر</b></label>
                                            <div class="controls">
                                                <input type="text" style="text-align:right;margin-right:50px;" id="year" name="year" placeholder="سنة النشر" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" style="text-align:left;margin-right:15px;"for="Availability"><b> عدد النسخ </b></label>
                                            <div class="controls">
                                                <input type="text" style="text-align:right;margin-right:50px;" id="availability" name="availability" placeholder="عدد النسخ" class="span8" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" style="text-align:left;margin-right:15px;" for="book_name"><b> تحميل الكتاب</b></label>
                                            <div class="controls">
                                                <input type="file" id="book_name" name="pdf" placeholder="book_name" class="span8" required>
                                            </div>
                                        </div>
                                        

                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" name="submit"class="btn">إضافة كتاب</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>

                        
                        
                    </div><!--/.content-->
                </div>

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

        <?php
if(isset($_POST['submit']))
{
    $title=$_POST['title'];
    $author1=$_POST['author1'];
    $author2=$_POST['author2'];
    $author3=$_POST['author3'];
    $publisher=$_POST['publisher'];
    $year=$_POST['year'];
    $availability=$_POST['availability'];

    $pdffile=$_FILES['pdf']['name'];
    if(isset($pdffile))
    {
        //$pdffile=$_FILES['pdf']['name'];
        $pdf_type=$_FILES['pdf']['type'];
        $pdf_size=$_FILES['pdf']['size'];
        $pdf_loc=$_FILES['pdf']['tmp_name'];
        $pdf_store="../student/files/books/".$pdffile;
        
        $sql1="insert into LMS.book (Title,book_name,Publisher,Year,Availability) values ('$title','$pdffile','$publisher','$year','$availability')";
        $result=mysqli_query($conn,$sql1);
            move_uploaded_file($pdf_loc,$pdf_store);
            if($result=== TRUE)
        {
           // header( "Refresh:0.01; url=addbook.php", true, 303); 
            $sql2="select max(BookId) as x from LMS.book";
            $res=$conn->query($sql2);
            $row=$res->fetch_assoc();
            $x=$row['x']; 
            $sql3="insert into LMS.author values ('$x','$author1')";
            $res=$conn->query($sql3);
            if(!empty($author2))
            { $sql4="insert into LMS.author values('$x','$author2')";
            $res=$conn->query($sql4);}
            if(!empty($author3))
            { $sql5="insert into LMS.author values('$x','$author3')";
            $res=$conn->query($sql5);}

            echo "<script type='text/javascript'>alert('تم الاضافة بنجاح')</script>";
            }
            else
            {//echo $conn->error;
            echo "<script type='text/javascript'>alert('خطأ')</script>";
            }
        }
       
        else{
            $query="insert into LMS.book (Title,book_name,Publisher,Year,Availability) VALUES ('$title','$pdffile','$publisher','$year','$availability')";
            $result=mysqli_query($conn,$query);
            if($result=== TRUE)
            {
                header('location:../addbook.php');  
                $sql2="select max(BookId) as x from LMS.book";
            $res=$conn->query($sql2);
            $row=$res->fetch_assoc();
            $x=$row['x']; 
            $sql3="insert into LMS.author values ('$x','$author1')";
            $res=$conn->query($sql3);
            if(!empty($author2))
            { $sql4="insert into LMS.author values('$x','$author2')";
            $res=$conn->query($sql4);}
            if(!empty($author3))
            { $sql5="insert into LMS.author values('$x','$author3')";
            $res=$conn->query($sql5);
          }

            echo "<script type='text/javascript'>alert('تم الاضافة بنجاح ')</script>";
            }
            else
            {//echo $conn->error;
            echo "<script type='text/javascript'>alert('خطأ')</script>";
            }
        }
            }
           
        }
    
   /* header('location:../books.php');   
$sql2="select max(BookId) as x from LMS.book";

$result=$conn->query($sql2);
$row=$result->fetch_assoc();
$x=$row['x'];
$sql3="insert into LMS.author values ('$x','$author1')";
$result=$conn->query($sql3);
if(!empty($author2))
{ $sql4="insert into LMS.author values('$x','$author2')";
  $result=$conn->query($sql4);}
if(!empty($author3))
{ $sql5="insert into LMS.author values('$x','$author3')";
  $result=$conn->query($sql5);}

echo "<script type='text/javascript'>alert('Success')</script>";
}
else
{//echo $conn->error;
echo "<script type='text/javascript'>alert('Error')</script>";
}
}   
}*/
?>
      
    </body>

</html>



   <!--script>
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
</script-->   
    </body>

</html>


