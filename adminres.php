<?php
    include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="admin.css">
    <title>Reservations</title>

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
          <a href="admindash.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
          <a id="reservation" href="adminres.php"><i class="fas fa-table"></i><span>Reservations</span></a>
          <a href="adminservice.php"><i class="fas fa-spa"></i><span>Services</span></a>
          
        </div>
        <!--sidebar end-->

        <button id="refresh" class="refresh">Refresh</button>
        <script>
        
        var refreshBtn = document.getElementById('refresh');

       
        refreshBtn.addEventListener('click', function() {
        
          location.reload();
        });
      </script>
   
        <div class="table-wrapper">

        <form action="" method="GET">
                <div class="search">
                    <input type="text" name="search" required  class="form-control" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>"placeholder="Search...">
                    <button type="submit" class="searchbtn">Search</button>
                </div>
        </form>
        
          
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
                  <th scope="col">Action</th>
              </tr>
              </thead>
              <tbody id="myTable">
             <?php 
                   
         

          $currentDate = date("Y-m-d");

          $query = "DELETE FROM reservation_tbl WHERE app_date < '$currentDate'";
          $result = mysqli_query($con, $query);
          if (!$result) {
            die("Query error: " . mysqli_error($con));
        }
        
          if(isset($_GET['search']))
                   {
                       $filtervalues = $_GET['search'];
                       
                       $query = "SELECT * FROM reservation_tbl WHERE CONCAT(cname,contact,date_booked,service_type,app_date,app_time) LIKE '%$filtervalues%' ";
                       $query_run = mysqli_query($con, $query);

                       if(mysqli_num_rows($query_run) > 0)
                       {
                           foreach($query_run as $items)
                           {
                           
                               ?>
                               
                               <tr>
                                   <td><?= $items['id']; ?></td>
                                   <td><?= $items['cname']; ?></td>
                                   <td><?= $items['contact']; ?></td>
                                   <td><?= $items['date_booked']; ?></td>
                                   <td><?= $items['service_type']; ?></td>
                                   <td><?= $items['app_date']; ?></td>
                                   <td><?= $items['app_time']; ?></td>
                                   <td>
          
                                    <a href="deleteres.php?deleteid='.$id.'" id="delete" name="delete" class="actionbtn">DELETE</a>
                                    
                                  </td>
                               </tr>
                               <?php
                           }
                       }
                       else
                       {
                           ?>
                               <tr>
                                   <td colspan="6">No Record Found</td>
                               </tr>
                           <?php
                       }
                   }else{
                    
                 
                    $sql="Select * from reservation_tbl ORDER BY app_date ASC";
                    $result=mysqli_query($con, $sql);
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
                      <td>'.$formatted_time.'</td>
                      <td>
          
                      <a href="deleteres.php?deleteid='.$id.'" id="delete" name="delete" class="actionbtn">DELETE</a>
                      
                      </td>
                      </tr>';
                    }
                  

                   }
               ?>


       
         
       


              <tbody>
          </table>
      </div>

    
        
    </div>
    
</body>
</html>