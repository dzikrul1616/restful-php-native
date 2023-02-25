<?php
 include "conn.php";

 $id_news = isset ($_POST['id_news']) ? $_POST['id_news'] : "";
 $title = isset ($_POST['title']) ? $_POST['title'] : "";
 $content = isset ($_POST['content']) ? $_POST['content'] : "";
 $description = isset ($_POST['description']) ? $_POST['description'] : "";
 $tanggal = date('Y/m/d H:i:s');
 $id_news = isset ($_POST['id_news']) ? $_POST['id_news'] : "";
 $tanggal = date('Y/m/d H:i:s');
 $image = date('dmYHis').str_replace(" ","",basename($_FILES['image']['name']));
 $imagepath = "upload/".$image;
 move_uploaded_file($_FILES['image']['tmp_name'],$imagepath);

 $sql = "UPDATE `tbl_news` SET `title`='".$title."', `content`='".$content."', `description`='".$description."', `date_news`='".$tanggal."', `image`='".$image."' WHERE `id_news`='".$id_news."';";

 $query = mysqli_query ($conn, $sql);
 if ($query){
    $msg = "Terupdate";
 } else {
    $msg = "Gagal";
 }

 $response = array (
    'status'=>'OK',
    'msg'=> $msg
 );

echo json_encode($response);
?>