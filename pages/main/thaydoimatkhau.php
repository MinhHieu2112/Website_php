<?php
if(isset($_POST['doimatkhau'])){
    $taikhoan = $_POST['email'];
    $matkhau_cu = md5($_POST['password_cu']);
    $matkhau_moi = md5($_POST['password_moi']);
    $sql = "SELECT * FROM tbl_dangky WHERE email = '".$taikhoan."' AND matkhau = '".$matkhau_cu."' LIMIT 1";
    $result = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($result);
    if($count > 0){
        $sql_update = "UPDATE tbl_dangky SET matkhau = '".$matkhau_moi."' WHERE email = '".$taikhoan."'";
        mysqli_query($mysqli, $sql_update);
        echo '<p style="color: green;">Mật khẩu đã được thay đổi.</p>';
    } else {
        echo '<p style="color: red;">Tài khoản hoặc mật khẩu cũ không đúng, vui lòng nhập lại.</p>';
    }
}
?>

<form action="" autocomplete="off" method="POST">
    <table border="1" class="table-login" style="text-align: center;border-collapse: collapse;">
        <tr>
            <td colspan="2"><h1>Đổi mật khẩu </h1></td>
        </tr>
        <tr>
            <td>Tài khoản</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Mật khẩu cũ</td>
            <td><input type="password" name="password_cu"></td> <!-- Sửa type của input password -->
        </tr>
        <tr>
            <td>Mật khẩu mới</td>
            <td><input type="password" name="password_moi"></td> <!-- Sửa type của input password -->
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="doimatkhau" value="Đổi mật khẩu"></td>
        </tr>
    </table>
</form>
