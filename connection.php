<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "ammarradb";

    if(!$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)){

        die("connection failed!!");
        
    }


?>