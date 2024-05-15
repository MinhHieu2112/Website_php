<?php
if(isset($_POST['dangnhap'])){
    $taikhoan = $_POST['email']; // Sửa tên biến
    $matkhau = md5($_POST['password']);
    $sql = "SELECT * FROM tbl_dangky WHERE email = '".$taikhoan."' AND matkhau = '".$matkhau."' LIMIT 1"; // Sửa biến $email thành $taikhoan
    $result = mysqli_query($mysqli, $sql); // Sửa tên biến từ $row thành $result
    $count = mysqli_num_rows($result); // Sửa tên biến từ $row thành $result
    if($count > 0){
        // Lấy dòng dữ liệu từ kết quả truy vấn
        $row = mysqli_fetch_assoc($result);
        $_SESSION['dangky'] = $row['tenkhachhang']; // Sử dụng giá trị từ trường 'tenkhachhang' của dòng dữ liệu đã được truy vấn
        $_SESSION['email'] = $row['email'];
        header("Location: index.php?quanly=giohang");
    }else{
        echo '<p style="color:red">Email hoặc mật khẩu không đúng! Vui lòng kiểm tra lại.</p>';
    }
}
?>

<form action="" autocomplete="off" method="POST">
        <table border="1">
            <tr>
                <td colspan="2"><h1>Đăng nhập khách hàng</h1></td>
            </tr>
            <tr>
                <td>Tên đăng nhập</td>
                <td><input type="text" name="email" placeholder="Email..."></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="password" name="password" placeholder="Mật khẩu ..."></td> <!-- Sửa type của input password -->
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
            </tr>
        </table>
        </form>