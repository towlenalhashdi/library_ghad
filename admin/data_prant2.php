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
		<title>تقرير  بالكتب المستعارة حالياً </title>
		
		<style>
		
		
.container {
	width:75%;
	margin:auto;
}
		
.table {
    width: 100%;
    margin-bottom: 20px;
}	

.table-striped tbody > tr:nth-child(odd) > td,
.table-striped tbody > tr:nth-child(odd) > th {
    background-color: #f9f9f9;
}

@media print{
#print {
display:none;
}
}

#print {
	width: 90px;
    height: 30px;
    font-size: 18px;
    background: white;
    border-radius: 4px;
	margin-left:28px;
	cursor:hand;
}
		
		</style>
<script>
function printPage() {
    window.print();
}
</script>
		
</head>


<body>
	<div class = "container">
		<div id = "header">
		<br/>

<button type="submit" id="print" onclick="printPage()">طباعة</button>
			<p style = "margin-left:350px; margin-top:50px; font-size:14pt; font-weight:bold;">	تقرير  بالكتب المستعارة حالياً &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
       	
		<br/>
<?php
					include ('dbconn.php');
					
					$sql="select record.BookId,RollNo,Title,Due_Date,Date_of_Issue,datediff(curdate(),Due_Date) as x from LMS.record,LMS.book where Date_of_Issue is NOT NULL and Date_of_Return is NULL and book.Bookid = record.BookId";

                                    $result=$conn->query($sql);
                                    $rowcount=mysqli_num_rows($result);
?>
							<table class="table" id = "tables" dir="rtl">
						  
                        <thead style="text-align:right;" >
                                    <tr >
                                      <th width="">رقم الطالب</th>  
                                      <th width="">رقم الكتاب</th>
                                      <th width="">اسم الكتاب</th>
                                      <th width="">تاريخ الاعارة</th>
                                      <th width="">تاريخ الاستحقاق</th>
                                      <th>مستحقات</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                            
                            //$result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $rollno=$row['RollNo'];
                                $bookid=$row['BookId'];
                                $name=$row['Title'];
                                $issuedate=$row['Date_of_Issue'];
                                $duedate=$row['Due_Date'];
                                $dues=$row['x'];
                            
                           
                            ?>
                                    <tr>
                                      <td><?php echo strtoupper($rollno) ?></td>
                                      <td><?php echo $bookid ?></td>
                                      <td><?php echo $name ?></td>
                                      <td><?php echo $issuedate ?></td>
                                      <td><?php echo $duedate ?></td>
                                      <td><?php if($dues > 0)
                                                  echo "<font color='red'>".$dues."</font>";
                                                else
                                                  echo "<font color='green'>0</font>";
                                              ?>
                                    </tr>
                               <?php } ?>
                               </tbody> 
					  </table> 

<br />
<br />



<div align="right">
		
		<?php include('current-date.php'); ?>
    <b style="color:blue;">تاريخ الطباعة</b>
        </div>		
        <b style = "margin-left:30px;  ">
:تمت طباعته بواسطة
</b>

			</div>
	
	
	      
          
	

	</div>
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