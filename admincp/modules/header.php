<?php

if(isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1){
    unset($_SESSION['dangnhap']);
    header('Location: login.php');
    exit(); // Chắc chắn dừng việc thực thi script ngay tại đây
}
?>
