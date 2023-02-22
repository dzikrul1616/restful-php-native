<?php
    $servename = "localhost";
    $username = "root";
    $password = "";
    $databasename = "app_news";

    $conn = mysqli_connect ($servename, $username, $password, $databasename);
    if (!$conn){
        die("KOenksi tidak berhasil");
    }
?>