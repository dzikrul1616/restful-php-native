<?php
    require "../newsapp/connect.php";
    if ($_SERVER['REQUEST_METHOD']=="POST"){
        $response = array();
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $check = "SELECT *  FROM tbl_users WHERE email='$email' and password='$password'";    
        $result = mysqli_fetch_array(mysqli_query($connect, $check));

        if(isset($result)){
            $response['value']=0;
            $response['messege']="login succesfully";
            echo json_encode($response);
        } else {
            $response['value']=1;
            $response['messege']="login denied";
            echo json_encode($response);
        }
    }
?>