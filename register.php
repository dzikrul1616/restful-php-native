<?php
 include "conn.php";

 $username = isset ($_POST['username']) ? $_POST['username'] : "";
 $email = isset ($_POST['email']) ? $_POST['email'] : "";
 $password = md5($_POST['password']);
 $level = isset ($_POST['level']) ? $_POST['level'] : "";
 $tanggal = date('Y/m/d H:i:s');

 $sql = "INSERT INTO `tbl_users` (`id_users`, `username`, `email`, `password`, `level`, `register_date`) 
 VALUES ('', '".$username."', '".$email."', '".$password."', '".$level."','".$tanggal."');";

 $query = mysqli_query ($conn, $sql);
 if ($query){
    $msg = "Tersimpan";
 } else {
    $msg = "Gagal";
 }

 $response = array (
    'status'=>'OK',
    'msg'=> $msg
 );

echo json_encode($response);
?>