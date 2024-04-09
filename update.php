<?php
            include ("connection.php");

            
            
            if(count($_POST)>0)
            {
                
              mysqli_query($con, "UPDATE services_tbl set service_type='".$_POST['service_type']."', service_name='".$_POST['service_name']."', price='".$_POST['price']."', image='".$_POST['image']."' WHERE ser_id='".$_GET['updateid']."'");

              
            } 
            $result=mysqli_query($con, "SELECT * from services_tbl WHERE ser_id='".$_GET['updateid']."'");
            $row=mysqli_fetch_array($result);

            if($result){
              ?>
                            <script>
                                Swal.fire({
                                    icon: 'Success',
                                    title: 'Update Success!',
                                })
                            </script>
                        <?php
            }

          


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
   
    <title>Update Services</title>

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
            <h4>Adminxcz#frantz</h4>
          </div>
          <a href="admindash.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
          <a href="adminres.php"><i class="fas fa-table"></i><span>Reservations</span></a>
          <a id="services" href="adminservice.php"><i class="fas fa-spa"></i><span>Services</span></a>
          
        </div>
        <!--sidebar end-->

        <div id="Update" class="update">

        <!-- Modal content -->
        <div class="update-content">
          <h2 class="modal-title">UPDATE SERVICE</h2>
          <form class="form" method="post" >
          <div class="form-group">
              <label>Service Type</label>
              <select class="form-control" id="service_type" name="service_type" value="<?php echo $row['service_type']?>" required>
                <option>Hair</option>
                <option>Skin/Face</option>
                <option>Nails</option>
              </select>
            </div>
            <div class="form-group">
              <label>Service Name</label>
              <input type="text" class="form-control" id="service_name" name="service_name" placeholder="Service Name" value="<?php echo $row['service_name']?>" required>
            </div>
            
            <div class="form-group">
              <label>Price</label>
              <input type="number" class="form-control" id="priceup" name="price" placeholder="Price" value="<?php echo $row['price']?>" required>
            </div>

            <div class="form-group" action="upload.php" enctype="multipart/form-data">
              <label>Image upload</label>
              <input type="file" name="image" class="file-upload-default">
            </div>
            

            <button type="submit" id="update" name="submit">Update</button>



          </form>
        </div>

        
        
    </div>
    
</body>
</html>



