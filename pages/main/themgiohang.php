<?php
    session_start();
    include('../../admincp/config/config.php');
    //-----------------Thêm số lượng sản phẩm trong giỏ hàng-----------------------
    
    if(isset($_GET['cong']) && isset($_SESSION['cart'])){
        $id = $_GET['cong']; // Lấy id sản phẩm cần tăng số lượng từ query string
        
        // Truy vấn cơ sở dữ liệu để lấy số lượng của sản phẩm
        $sql = "SELECT soluong FROM tbl_sanpham WHERE id_sanpham = '".$id."' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_array($query);
        
        // Nếu sản phẩm tồn tại trong cơ sở dữ liệu
        if($row){
            // Duyệt qua từng sản phẩm trong giỏ hàng
            foreach($_SESSION['cart'] as &$cart_item){
                // Kiểm tra nếu id của sản phẩm trùng khớp với id cần tăng số lượng
                if($cart_item['id'] == $id){
                    // So sánh số lượng trong giỏ hàng với số lượng từ cơ sở dữ liệu
                    if($cart_item['soluong'] < $row['soluong']){
                        // Nếu số lượng trong giỏ hàng nhỏ hơn số lượng từ cơ sở dữ liệu, tăng số lượng lên 1
                        $cart_item['soluong']++;
                    }
                    break; // Kết thúc vòng lặp sau khi tăng số lượng
                }
            }
        }
         // Chuyển hướng người dùng về trang giỏ hàng sau khi tăng số lượng sản phẩm
    header('Location:../../index.php?quanly=giohang');
    exit(); // Dừng thực thi mã ngay sau khi chuyển hướng
    }

    //----------------Giảm số lượng sản phẩm trong giỏ hàng----------------------
if(isset($_GET['tru']) && isset($_SESSION['cart'])){
    $id = $_GET['tru']; // Lấy id sản phẩm cần giảm số lượng từ query string
    
    // Duyệt qua từng sản phẩm trong giỏ hàng
    foreach($_SESSION['cart'] as &$cart_item){
        // Kiểm tra nếu id của sản phẩm trùng khớp với id cần giảm số lượng
        if($cart_item['id'] == $id){
            // Giảm số lượng sản phẩm đi 1, nhưng không thể nhỏ hơn 1
            $cart_item['soluong'] = max(1, $cart_item['soluong'] - 1);
            break; // Kết thúc vòng lặp sau khi giảm số lượng
        }
    }
// Chuyển hướng người dùng về trang giỏ hàng sau khi giảm số lượng sản phẩm
header('Location:../../index.php?quanly=giohang');
exit(); // Dừng thực thi mã ngay sau khi chuyển hướng
}

   //------------------Xóa sản phẩm khỏi giỏ hàng-------------------------------
   if(isset($_SESSION['cart']) && isset($_GET['xoa'])){
    $id = $_GET['xoa']; // Lấy id sản phẩm cần xóa từ query string
    
    // Tạo một mảng mới để lưu lại giỏ hàng sau khi xóa sản phẩm
    $updated_cart = array();
    
    // Duyệt qua từng sản phẩm trong giỏ hàng
    foreach($_SESSION['cart'] as $cart_item){
        // Kiểm tra nếu id của sản phẩm không trùng khớp với id cần xóa
        if($cart_item['id'] != $id){
            // Nếu không trùng khớp, thêm sản phẩm vào mảng giỏ hàng đã được cập nhật
            $updated_cart[] = $cart_item;
        }
    }
    
    // Gán lại giỏ hàng với mảng đã được cập nhật
    $_SESSION['cart'] = $updated_cart;
    
    // Chuyển hướng người dùng về trang giỏ hàng sau khi xóa sản phẩm
    header('Location:../../index.php?quanly=giohang');
    exit(); // Dừng thực thi mã ngay sau khi chuyển hướng
}
    //-------------------xoa tat ca----------------------------------------------
    if(isset($_GET['xoatatca'])&& $_GET['xoatatca']==1){
        unset($_SESSION['cart']);
        header('Location:../../index.php?quanly=giohang');
    }
    //-------------------thêm giỏ hàng------------------------------------------
    if(isset($_POST['themgiohang'])){
        $id = $_GET['idsanpham'];
        $soluong = 1;
        
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '".$id."' LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        $row = mysqli_fetch_array($query);
        
        if($row){
            $new_product = array(
                'tensanpham' => $row['tensanpham'],
                'id' => $id,
                'soluong' => $soluong,
                'giasp' => $row['giasp'],
                'hinhanh' => $row['hinhanh'],
                'masp' => $row['masp']
            );
            
            if(isset($_SESSION['cart'])){
                $found = false;
                foreach($_SESSION['cart'] as &$cart_item){
                    if($cart_item['id'] == $id){
                        $cart_item['soluong'] += $soluong;
                        $found = true;
                        break;
                    }
                }
                if(!$found){
                    $_SESSION['cart'][] = $new_product;
                }
            } else {
                $_SESSION['cart'] = array($new_product);
            }
        }
        
        header('Location:../../index.php?quanly=giohang');
        exit(); // Dừng thực thi mã ngay sau khi chuyển hướng
    }
?>
