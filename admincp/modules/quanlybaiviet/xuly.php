<?php
include('../../config/config.php');

$tenbaiviet = $_POST['tenbaiviet'];
//Xuly hinh anh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh = time().'_'.$hinhanh;
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];
$danhmuc = $_POST['danhmuc'];

 //Thêm
if(isset($_POST['thembaiviet'])){
    $sql_them = "INSERT INTO tbl_baiviet(tenbaiviet,hinhanh,tomtat,noidung,id_danhmuc,tinhtrang) VALUE('".$tenbaiviet."','".$hinhanh."','".$tomtat."','".$noidung."','".$danhmuc."','".$tinhtrang."')";
    mysqli_query($mysqli,$sql_them);
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    header('Location:../../index.php?action=quanlybaiviet&query=them');

 //Sửa   
 } elseif(isset($_POST['suabaiviet'])) {

    if(!empty($_FILES['hinhanh']['name'])){
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
        $sql = "SELECT * FROM tbl_baiviet WHERE id = '$_GET[idbaiviet]' LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        while($row = mysqli_fetch_array($query)){
            unlink('uploads/'.$row['hinhanh']);
        }
        $sql_update = "UPDATE tbl_baiviet SET tenbaiviet = '".$tenbaiviet."',hinhanh = '".$hinhanh."', tomtat = '".$tomtat."', noidung = '".$noidung."', tinhtrang = '".$tinhtrang."', id_danhmuc = '".$danhmuc."' 
        WHERE id = '$_GET[idbaiviet]'";
    } else {
        $sql_update = "UPDATE tbl_baiviet SET tenbaiviet = '".$tenbaiviet."', tomtat = '".$tomtat."', noidung = '".$noidung."', tinhtrang = '".$tinhtrang."', id_danhmuc = '".$danhmuc."' 
        WHERE id = '$_GET[idbaiviet]'";
    }    
    mysqli_query($mysqli,$sql_update);
    header('Location:../../index.php?action=quanlybaiviet&query=them');
//Xoá    
} else {
    $id=$_GET['idbaiviet'];
    $sql = "SELECT * FROM tbl_baiviet WHERE id = '$id' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    while($row = mysqli_fetch_array($query)){
        unlink('upload/'.$row['hinhanh']);
    }
    $sql_xoa = "DELETE FROM tbl_baiviet WHERE id='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../index.php?action=quanlybaiviet&query=them');
}

?>