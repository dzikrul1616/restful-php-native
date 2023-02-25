    <?php
    include "conn.php";

    $title = isset ($_POST['title']) ? $_POST['title'] : "";
    $content = isset ($_POST['content']) ? $_POST['content'] : "";
    $description = isset ($_POST['description']) ? $_POST['description'] : "";
    $tanggal = date('Y/m/d H:i:s');
    $id_users = isset ($_POST['id_users']) ? $_POST['id_users'] : "";
    $tanggal = date('Y/m/d H:i:s');
    $image = date('dmYHis').str_replace(" ","",basename($_FILES['image']['name']));
    $imagepath = "upload/".$image;
    move_uploaded_file($_FILES['image']['tmp_name'],$imagepath);

    $sql = "INSERT INTO `tbl_news` (`id_news`, `image`, `title`, `content`, `description`, `date_news`, `id_users`) 
    VALUES ('', '".$image."', '".$title."', '".$content."', '".$description."','".$tanggal."','".$id_users."');";

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