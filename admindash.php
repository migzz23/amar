<?php
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="admin.css">
   
    <title>Services</title>

</head>
<body>

    
    <div id="section1">

        <input type="checkbox" id="check">
        <!--header area start-->
        <header>
          <div class="left_area">
          <h3>Amarra <span> Aesthetic</span> Studio</h3>
          </div>
          
          <label for="check">
              <i class="fas fa-bars" id="sidebar_btn"></i>
          </label>
          <div class="right_area">
            <!--<div id="search">
              <input type="text" id="myInput" name="search" class="form-control" placeholder="Search..">
              <button type="submit" name="searchbtn" id="searchbtn" class="form-control">Search</button>
            </div>-->
            <a href="adminlogin.php" class="logout_btn">Logout</a>
          </div>
        </header>
        <!--header area end-->
        <!--mobile navigation bar start
        <div class="mobile_nav">
          <div class="nav_bar">
            <img src="1.png" class="mobile_profile_image" alt="">
            <i class="fa fa-bars nav_btn"></i>
          </div>
          <div class="mobile_nav_items">
            <a href="#"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
            <a href="#"><i class="fas fa-cogs"></i><span>Components</span></a>
            <a href="#"><i class="fas fa-table"></i><span>Tables</span></a>
            <a href="#"><i class="fas fa-th"></i><span>Forms</span></a>
            <a href="#"><i class="fas fa-info-circle"></i><span>About</span></a>
            <a href="#"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
          </div>
        </div>
        mobile navigation bar end-->
        <!--sidebar start-->
        <div class="sidebar">
          <div class="profile_info">
            <img src="images/profile.png" class="profile_image" alt="">
            <h4>Admin</h4>
          </div>
          <a id="dash"href="adminindex.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
          <a href="adminres.php"><i class="fas fa-table"></i><span>Reservations</span></a>
          <a href="adminservice.php"><i class="fas fa-spa"></i><span>Services</span></a>
          
        </div>
        <!--sidebar end-->

        <div id="section1dash">

            <div class="backheader">
           

              <div class="imageheader"> <img src="assets/img/AMMRA.png" alt=""></div>


                <div class="container_counter">

                    <div class="counter">
                        <i class="fas fa-spa"></i>
                        <h2>Services</h2> 
                        <?php

                          $dash_services_query = "SELECT * from services_tbl";
                          $dash_services_query_run = mysqli_query($con, $dash_services_query);
                          
                          if($services_total = mysqli_num_rows($dash_services_query_run)){
                            echo '<h1>'.$services_total.'</h1>';
                          }
                          else{
                            echo '<h1>0</h1>';
                          }

                        ?>
                        
                    
                    </div>
                    <div class="counter">
                        <i class="fas fa-table"></i>
                        <h2>Reservations</h2>

                        <?php

                          $dash_reservation_query = "SELECT * from reservation_tbl";
                          $dash_reservation_query_run = mysqli_query($con, $dash_reservation_query);
                          
                          if($reservation_total = mysqli_num_rows($dash_reservation_query_run)){
                            echo '<h1>'.$reservation_total.'</h1>';
                          }
                          else{
                            echo '<h1>0</h1>';
                          }

                        ?>
                    
                    </div>
                    <div class="counter">
                        <i class="fas fa-table"></i>
                        <h2>Today</h2>
                        <?php

                          
                          $dash_reservation_query = "SELECT * from reservation_tbl WHERE `app_date` = DATE(NOW())";
                          $dash_reservation_query_run = mysqli_query($con, $dash_reservation_query);
                          
                          if($reservation_total = mysqli_num_rows($dash_reservation_query_run)){
                            echo '<h1>'.$reservation_total.'</h1>';
                          }
                          else{
                            echo '<h1>0</h1>';
                          }

                        ?>
                        
                    
                    </div>
                    <div class="counter">
                        <i class="fas fa-table"></i>
                        <h2>This Month</span></h2>
                        <?php

                          $dash_reservation_query = "SELECT * from reservation_tbl WHERE MONTHNAME(app_date) = MONTHNAME(now())";
                          $dash_reservation_query_run = mysqli_query($con, $dash_reservation_query);
                          
                          if($reservation_total = mysqli_num_rows($dash_reservation_query_run)){
                            echo '<h1>'.$reservation_total.'</h1>';
                          }
                          else{
                            echo '<h1>0</h1>';
                          }

                        ?>
                       
                    
                    </div>
                    
                    


                </div>


            </div>



        </div>

        <div id="section2dash">

            <div class="table-wrapper">

              <h2 style="margin-left: 20px;">Reservations Today</h2>
          
                <table class="fl-table">
                    <thead>
                    <tr>
                        <th scope="col">Client ID</th>
                        <th scope="col">Client Name</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Date Booked</th>
                        <th scope="col">Service Type</th>
                        <th scope="col">Appointment Date</th>
                        <th scope="col">Time</th>
                    </tr>
                    </thead>
                    <tbody id="myTable">
               <?php 
                $dash_reservation_query = "SELECT * from reservation_tbl WHERE `app_date` = DATE(NOW())";
                $dash_reservation_query_run = mysqli_query($con, $dash_reservation_query);
                
                $result=mysqli_query($con, $dash_reservation_query);
                while($row=mysqli_fetch_assoc($result)){
      
                  $id=$row['id'];
                  $cname=$row['cname'];
                  $contact=$row['contact'];
                  $date_booked=$row['date_booked'];
                  $service_type=$row['service_type'];
                  $app_date=$row['app_date'];
                  $app_time=$row['app_time'];
                  $formatted_time = date("g:i A", strtotime($app_time));
                  echo '
                  <tr>
                  <th scope="row">'.$id.'</th>
                  <td>'.$cname.'</td>
                  <td>'.$contact.'</td>
                  <td>'.$date_booked.'</td>
                  <td>'.$service_type.'</td>
                  <td>'.$app_date.'</td>
                  <td>'. $formatted_time.'</td>';
                }
              ?>
                    <tbody>
                </table>
            </div>


        </div>

    


      
        
    </div>
    
</body>
</html>



