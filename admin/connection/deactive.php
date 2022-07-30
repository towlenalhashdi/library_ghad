<?php
    include('DB.php');
    $ids = array();
    // $ids = implode(",",$_POST["id"]);
    $ids = $_POST["RollNo"];
    
    
    // $deactive = "UPDATE inf SET active=0 where n_id IN(".$ids.")";
    $deactive = "UPDATE LMS.message SET active=0 where RollNo= ".$ids." ";
    
    $result = mysqli_query($connection,$deactive);
    echo mysqli_error($connection);

?>