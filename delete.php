<?php
include("connection.php");

    if(isset($_GET['deleteid'])){
      $ser_id=$_GET['deleteid'];

      $sql="DELETE from services_tbl where ser_id=$ser_id";
      $result=mysqli_query($con, $sql);
      if($result){
        ?>
        
      <?php

      header("Location: adminservice.php");
   
      }
      else{
        die(mysqli_error($con));
      }
    }


    

  ?>

