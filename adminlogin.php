<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="adminlogin.css">
    <title>Admin</title>
</head>

    <body>
        <center><div class = "container">

            <div class="image" style="background-image: url(assets/img/bg1.jpg);">

                <img src="assets/img/navlogo.jpg" alt="">

            </div>

            <form class= "form" method="post">

                <h1>ADMIN</h1>

                <hr>

                <div class="form-group">
                    
                    <input type="text" placeholder="Username" class="form-control" id="username"  name="username" autocomplete="off">
                    <i class="fas fa-user-lock" ></i>
                </div>

                <div class="form-group">
                    <input type="password" placeholder="Password" class="form-control" id="password" name="password" autocomplete="off">
                    <i class="fas fa-eye" id="showpass"></i>
                    <i class="fas fa-eye-slash" id="hidepass" style="display: none;"></i>
                    
                </div>


                <button class ="btn" name="login">Login</button>


            </form>



            <?php

                session_start();
                include("connection.php");
                include("function.php");
                if($_SERVER['REQUEST_METHOD'] == "POST")
                {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    if(!empty($username) && !empty($password) && !is_numeric($username))
                    {
                        $query = "select * from admin_tbl where username = '$username' limit 1";
                        $result = mysqli_query($con, $query);

                        if($result)
                        {
                            if($result && mysqli_num_rows($result) > 0)
                            {
                                $user_data = mysqli_fetch_assoc($result);
                                if($user_data['password'] === $password)
                                {
                                    $_SESSION['id'] = $user_data['id'];
                                    header("location: admindash.php");
                                    die;
                                }
                            }
                        }
                        ?>
                                <script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Invalid!',
                                        text: 'Invalid Credentials'
                                    })
                                </script>
                                <?php
                        
                    }
                } 

            ?>
            
            <?php
                if(isset($_POST['login'])){
                    $n=$_POST['username'];
                    $e=$_POST['password'];
                    if(empty($username) || empty($password)){
                    ?>
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Fill Up!',
                            text: 'Input Fields Cant Be Empty'
                        })
                    </script>
                    <?php
                    }
                }
            ?>

            <script>
                let showpass = document.getElementById("showpass");
                let password = document.getElementById("password");
                let hidepass = document.getElementById("hidepass");
                showpass.onclick = function(){
                    if(password.type == "password"){
                        password.type = "text";
                        document.getElementById('showpass').style.display = "none";
                        document.getElementById('hidepass').style.display = "inline";
                
                    }
                }  
                hidepass.onclick = function(){
                    if(password.type == "text"){
                    
                        password.type = "password";
                        document.getElementById('showpass').style.display = "inline";
                        document.getElementById('hidepass').style.display = "none";
                }
                }
                
            </script>




        </div></center>
    </body>
</html>