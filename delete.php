<?php
 include "conn.php";

 $id_news = isset($_POST['id_news']) ? $_POST['id_news'] : "";
 $sql = "DELETE FROM `tbl_news` WHERE `id_news` = '$id_news'";

 $query = mysqli_query ($conn, $sql);

 if ($query){
    $msg = "Berhasil dihapus";
 } else {
    $msg = "Gagal dihapus";
 }

 $response = array (
    'status'=>'OK',
    'msg'=> $msg
 );

echo json_encode($response);
?>
