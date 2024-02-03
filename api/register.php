<?php
    include('connect.php');


    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $cpassword = isset($_POST['cpassword']) ? $_POST['cpassword'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $image = isset($_FILES['photo']['name']) ? $_FILES['photo']['name'] : '';
    $tmp_name = isset($_FILES['photo']['tmp_name']) ? $_FILES['photo']['tmp_name'] : '';
    $role = isset($_POST['role']) ? $_POST['role'] : '';
    

    if($password==$cpassword){
        move_uploaded_file($tmp_name,"../uploads/$image");
        $sql = mysqli_query($con,"INSERT INTO user (name, mobile, password, address, photo, role, status, votes) VALUES ('$name', '$mobile', '$password', '$address', '$image', '$role', 0, 0)") ;
        if($sql){

            
            echo '
                <script>
                    alert("Register success");
                    window.location = "../";
                </script>';
        }
        else{
            echo '
                <script>
                    alert("error occur");
                    window.location = "../routes/register.html";
                </script>';
        }
    }
    else{
        echo '
            <script>
                alert("Password does not match");
                window.location = "../routes/register.html";
            </script>';
    }



