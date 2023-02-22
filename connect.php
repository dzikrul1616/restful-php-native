<?php
$connect = new mysqli("localhost","root","","app_news");
if ($connect) {
    //echo "Connection Succesfull";
} else {
    //echo "Connection failed";
    exit();
}
?>