<?php
    $con = mysqli_connect("localhost","root","","voting");
    if($con){
        // echo "connected succesfully";
    }else{
        die ("connection error" . mysqli_connect_error());
    }
    
