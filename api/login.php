<?php
    session_start();
    include('connect.php');

    $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $role = isset($_POST['role']) ? $_POST['role'] : '';

    $sql = mysqli_query($con,"SELECT * FROM user WHERE mobile = '$mobile' AND password = '$password' AND role = '$role' ");

    if(mysqli_num_rows($sql) > 0) {
        $userdata = mysqli_fetch_array($sql);
        $groups = mysqli_query($con,"SELECT * FROM user WHERE role=2");
        $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);

        $_SESSION['userdata'] = $userdata;
        $_SESSION['groupsdata'] = $groupsdata;

        echo "
            <script>
                window.location = '../routes/dashboard.php';
            </script>";

    }else{
        echo 
            "<script>
                alert('user not found Register first...');
                window.open('../index.html','_self');
            </script>"
            ;
    }
