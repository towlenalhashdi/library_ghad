<?php 
require('dbconn.php');
if(isset($_GET['id'])){
    $bname=$_GET['id'];
    
    $loguser="select * from LMS.book where BookId='$bname' ";
$result=mysqli_query($conn,$loguser);


if(mysqli_num_rows($result)==1)
{
    foreach($result as $row)
      { $file_name=$row['book_name'];
        $file_path='files/books/'.$file_name;
        if(file_exists($file_path)){
    header('Content-Type: application/pdf');
    header('Content-Description: File Transfer');
    header('Content-Description: attachment; filename='.basename($file_path));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: '.filesize($file_path));
    readfile($file_path);
    exit();
    }
    else{
        echo $file_path;
        echo "not found";
    } 

}
}
else{
    echo "not found";
}
}?>