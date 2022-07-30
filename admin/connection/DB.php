<?php
   define('HOST','localhost');
   define('PWD','');
   define('USERNAME','root');
   define('DB','lms');
   
   $connection = mysqli_connect(HOST,USERNAME,PWD,DB);
   if($connection){
       return $connection;
   }else{
       echo "Connect problem".mysqli_connect_error();
   }

?>