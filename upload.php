<?php

include("connection.php");

    if(isset($_POST['submit'])){

        $file=$_FILES['image'];

        $fileName=$_FILES['image']['name'];
        $fileTmpName=$_FILES['image']['tmp_name'];
        $fileSize=$_FILES['image']['size'];
        $fileError=$_FILES['image']['error'];
        $fileType=$_FILES['image']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg','jpeg','png');

        if(in_array($fileActualExt,$allowed)){

            if($fileError === 0){
                if($fileSize<500000){

                    $fileNameNew = uniqid('',true).".".$fileActualExt;

                    $fileDestination = 'assets/img/services/'.$FileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);
                    header("Location: adminservice.php?uploadsuccess");

                }
                else{

                    echo "File to Big";
                }


            }else{

                echo "Error Uploading";

            }

        
        }else{
            echo "You Cannot upload files of this type";
        }


    }

?>