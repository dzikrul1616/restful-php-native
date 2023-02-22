<?php 
require "../newsapp/connect.php";
 if ($_SERVER['REQUEST_METHOD']=="POST") {
    $response = array();
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $insert = "INSERT INTO tbl_users VALUE(NULL, '$username','$email','$password','1',NOW())";
    if (mysqli_query($connect, $insert)){
        $response ['value']=1;
        $response ['messege']="Register Succesfully";
        echo json_encode($response);
    } else {
        $response['value']=0;
        $response['messege']="Register not Successfully";
        echo json_encode($response);
    }
 }
?>