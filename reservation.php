<?php
include("connection.php");

              
                if(isset($_POST['submit'])){
                  if(isset($_POST['service_type'])) {
                      $cname=$_POST['cname'];
                      $contact=$_POST['contact'];
                      $app_time=$_POST['app_time'];
                      $app_date=$_POST['app_date'];
                      $service_type=$_POST['service_type'];



                      $query = "SELECT COUNT(*) as count FROM reservation_tbl WHERE app_date = '$service_type'";
                      $result = $con->query($query);

                      if ($result && $result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $count = $row['count'];

                        if ($count < 2) {                           
                              // Insert the new record
                              $sql="INSERT into reservation_tbl (cname,contact,app_time,app_date,service_type) values ('$cname','$contact','$app_time','$app_date','$service_type')";

                              $result=mysqli_query($con, $sql);
                              if($result){
                                
                              }
                              else{
                              
                              }
                        
                        }else{
                          echo "Limit exceeded. Cannot add more entries for $app_date.";
                        }

                      }

                  }
                }

?>