<?php
include('../../admincp/config/config.php');
require('../../mail/sendmail.php');
require('../../Carbon/autoload.php');
use Carbon\Carbon;
use Carbon\CarbonInterval;
$now = Carbon::now('Asia/Ho_Chi_Minh');
$id_khachhang = $_SESSION['id_khachhang']; // Điều chỉnh tên biến
$code_order = rand(0,9999);
$insert_cart = "INSERT INTO tbl_cart (id_khachhang, code_cart, cart_status, cart_date) VALUES ('$id_khachhang', '$code_order', 1,'$now')"; // Sửa lỗi cú pháp và chính tả
$cart_query = mysqli_query($mysqli, $insert_cart);
if($cart_query){
    // Thêm chi tiết giỏ hàng
    foreach($_SESSION['cart'] as $key => $value){
        $id_sanpham = $value['id'];
        $soluong = $value['soluong'];
        $insert_order_details = "INSERT INTO tbl_cart_details (id_sanpham, code_cart, soluongmua) VALUES ('$id_sanpham', '$code_order', '$soluong')"; // Sửa lỗi cú pháp và chính tả
        mysqli_query($mysqli, $insert_order_details); // Điều chỉnh tên biến
    }
    $tieude = "Đặt hàng website banhangcongnghe.net thành công!";
    $noidung = "<p>Cảm ơn quý khách đã đặt hàng của chúng tôi với mã đơn hàng : $code_order</p>"; // Sử dụng cú pháp nhúng biến trực tiếp vào chuỗi
    $noidung .= "<h4> Đơn hàng đặt bao gồm : </h4>"; // Thêm dấu chấm phẩy và dấu bằng
    foreach($_SESSION['cart'] as $key => $value){
        $noidung .= "<ul style='border:1px solid blue; margin: 10px;'>
            <li>Tên sản phẩm : ".$value['tensanpham']."</li>
            <li>Số lượng : ".$value['soluong']."</li>
            <li>Giá : ".number_format($value['giasp'],0,',','.')."₫</li>
            <li>Tổng tiền : ".$value['giasp']*$value['soluong']."₫</li>
            </ul>"; // Sử dụng dấu .= để nối chuỗi
    }
    $maildathang = $_SESSION['email'];
    $mail = new Mailer();
    $mail->dathangmail($tieude, $noidung, $maildathang); // Điều chỉnh cách gọi phương thức
    unset($_SESSION['cart']);
    header('Location: ../../index.php?quanly=camon'); // Điều chỉnh đường dẫn chính xác
    exit(); // Kết thúc chương trình sau khi chuyển hướng
}
?>
