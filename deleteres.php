<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
  <title>Document</title>
</head>
<body>
<?php
    if(isset($_GET['deleteid'])){
      $id=$_GET['deleteid'];

      $sql="DELETE from reservation_tbl where id=$id";
      $result=mysqli_query($con, $sql);
      if($result){
        ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Reservation Removed Successfully'
            })
        </script>
        
      <?php
   
      }
      else{
        die(mysqli_error($con));
      }
    }


    

  ?>
</div>

</body>
</html>