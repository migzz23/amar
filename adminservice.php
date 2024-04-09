<?php
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="assets/js/custom.js"></script>
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
          <a href="adminres.php"><i class="fas fa-table"></i><span>Reservations</span></a>
          <a id="services" href="adminservice.php"><i class="fas fa-spa"></i><span>Services</span></a>
          
        </div>
        <!--sidebar end-->

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
                  <th scope="col">Service ID</th>
                  <th scope="col">Service Type</th>
                  <th scope="col">Service Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Image</th>
                  <th scope="col">Action</th>
              </tr>
              </thead>
              <tbody id="myTable">
            <?php
              if(isset($_GET['search']))
                   {
                       $filtervalues = $_GET['search'];
                       
                       $query = "SELECT * FROM services_tbl WHERE CONCAT(service_type,service_name,price) LIKE '%$filtervalues%' ";
                       $query_run = mysqli_query($con, $query);

                       if(mysqli_num_rows($query_run) > 0)
                       {
                           foreach($query_run as $items)
                           {
                           
                               ?>
                               
                               <tr>
                                   <td><?= $items['ser_id']; ?></td>
                                   <td><?= $items['service_type']; ?></td>
                                   <td><?= $items['service_name']; ?></td>
                                   <td><?= $items['price']; ?></td>
                                   <td><?= $items['image']; ?></td>
                                   <td>
          
                                    <a href="delete.php?deleteid='.$id.'" id="delete" name="delete" class="actionbtn">DELETE</a>
                                    
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

                      $sql="Select * from services_tbl";
                      $result=mysqli_query($con, $sql);
                      while($row=mysqli_fetch_assoc($result)){
            
                        $ser_id=$row['ser_id'];
                        $service_type=$row['service_type'];
                        $service_name=$row['service_name'];
                        $price=$row['price'];
                        $image=$row['image'];
                        echo '
                        <tr>
                        <th scope="row">'.$ser_id.'</th>
                        <td>'.$service_type.'</td>
                        <td>'.$service_name.'</td>
                        <td>'.$price.'</td>
                        <td>'.$image.'</td>
                        <td>
                        <a href="update.php?updateid='.$ser_id.'" class="actionbtn">UPDATE</a>
                        <a href="delete.php?deleteid='.$ser_id.'" id="delete" name="delete" class="actionbtn">DELETE</a>
                        </td>
                        </tr>';
                      }

                    }
          
          

          ?>



        <script>
        
        var delBtn = document.getElementById('delete');

       
        refreshBtn.addEventListener('click', function() {
        
          
            Swal.fire({
                icon: 'success',
                title: 'Deleted!',
                text: 'Service Deleted Successfully'
            })
          
        });
          </script>
        


              <tbody>
          </table>
      </div>

      <button id="refresh" class="refresh">Refresh</button>
      <button id="myBtn" class="cancelres">Add New Service</button>
      <script>
        // Get a reference to the refresh button element
        var refreshBtn = document.getElementById('refresh');

        // Attach a click event listener to the refresh button
        refreshBtn.addEventListener('click', function() {
          // Refresh the page
          location.reload();
        });
      </script>

      <!-- Add Service Modal -->
      <div id="myModal" class="modal">
      
        <!-- Modal content -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2 class="modal-title">ADD NEW SERVICE</h2>
          <form class="form" method="post" >
          <div class="form-group">
              <label for="service_type">Service Type</label>
              <select class="form-control" id="SelectType" name="service_type" required>
                <option>Hair</option>
                <option>Skin/Face</option>
                <option>Nails</option>
              </select>
            </div>
            <div class="form-group">
              
              <input type="text" class="form-control" id="exampleInputName1" name="service_name"placeholder="Service Name" required>
            </div>
            
            <div class="form-group">
              
              <input type="number" class="form-control" id="Price" name="price" placeholder="Price" required>
            </div>
            
            <div class="form-group" action="upload.php" enctype="multipart/form-data">
              <label>Image upload</label>
              <input type="file" name="image" class="file-upload-default">
            </div>

            <button type="submit" id="submitnew" name="submit">Submit</button>
           
            <?php
            if(isset($_POST['submit'])){
            $service_type=$_POST['service_type'];
            $service_name=$_POST['service_name'];
            $price=$_POST['price'];
            $image=$_POST['image'];

            $sql="INSERT into services_tbl (service_type,service_name,price,image) values ('$service_type','$service_name','$price','$image')";

            $result=mysqli_query($con, $sql);
            if($result){
              ?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Service Added Successfully'
                        })
                      
                    </script>

            
              <?php
              
            }
            else{
              die(mysqli_error("error"+$con));
            }
          }

          ?>

          </form>
        </div>
      
        </div>
      
     <!--UPDATE MODAL-->


      <script>
      // Get the modal
      var modal = document.getElementById("myModal");
      
      
      // Get the button that opens the modal
      
      var btn = document.getElementById("myBtn");
      
      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];
      // When the user clicks the button, open the modal 
      btn.onclick = function() {
        modal.style.display = "block";
      }


      
      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
      }

      
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        } 

      }


      </script>
        
    </div>
    
</body>
</html>



