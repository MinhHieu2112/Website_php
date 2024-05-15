
<p>Hình thức thanh toán</p>
<div class="container">
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
    <div class="step done"> <span> <a href="index.php?quanly=giohang">Giỏ hàng</a></span> </div>
    <div class="step done"> <span><a href="index.php?quanly=vanchuyen">Vận chuyển</a></span> </div>
    <div class="step current"> <span><a href="index.php?quanly=thongtinthanhtoan">Thanh toán</a><span> </div>
    <div class="step "> <span><a href="index.php?quanly=donhangdadat">Lịch sử đơn hàng</a><span> </div>
  </div>
  <form action="pages/main/xulythanhtoan.php" method="POST">
<div class="row">
  <?php
      $id_dangky = $_SESSION['id_khachhang'];
      $sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM tbl_shipping WHERE id_dangky='$id_dangky' LIMIT 1");
      $count = mysqli_num_rows($sql_get_vanchuyen);
      if($count > 0){
        $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
        $name = $row_get_vanchuyen['name'];
        $phone = $row_get_vanchuyen['phone'];
        $address = $row_get_vanchuyen['address'];
        $note = $row_get_vanchuyen['note'];
      } else {
        $name = '';
        $phone = '';
        $address = '';
        $note = '';
      }
  ?>
  <div class="col-md-8">
    <h4>Thông tin vận chuyển và giỏ hàng</h4>
    <ul>
      <li>Họ và tên vận chuyển : <b><?php echo $name ?></b></li>
      <li>Số điện thoại : <b><?php echo $phone ?></b></li>
      <li>Địa chỉ : <b><?php echo $address ?></b></li>
      <li>Ghi chú : <b><?php echo $note ?></b></li>
    </ul>
    <h5>Giỏ hàng của bạn</h5>
    
<table style="width:100%;text-align:center;border-collapse: collapse;" border = "1">
<tr>
    <th>Id</th>
    <th>Mã sản phẩm</th>
    <th>Tên sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Số lượng</th>
    <th>Giá sản phẩm</th>
    <th>Thành tiền</th>

</tr>
<?php 
if(isset($_SESSION['cart'])){
    $i = 0;
    $tongtien = 0;
    foreach($_SESSION['cart'] as $cart_item){
        $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
        $tongtien += $thanhtien;
        $i++;
?>
<tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $cart_item['masp']; ?></td>
    <td><?php echo $cart_item['tensanpham']; ?></td>
    <td><img src="admincp/modules/quanlysp/upload/<?php echo $cart_item['hinhanh']; ?>" width="150px"></td>
    <td>
        <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-circle-plus"></i></a>
        <?php echo $cart_item['soluong']; ?>
        <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-circle-minus"></i></a>
    </td>
    <td><?php echo number_format( $cart_item['giasp'],0,',','.').'₫'; ?></td>
    <td><?php echo number_format($thanhtien,0,',','.').'₫'; ?></td>
</tr>
<?php
   }
?>
<tr>
    <td colspan="8">
        <p style="float: left;">Tổng tiền : <?php echo number_format($tongtien,0,',','.').'₫'; ?></p></br>
        <div style="clear: both;"></div>     
    </td>
</tr>
<?php
} else {
?>
  <tr>
    <td colspan="8">Hiện tại giỏ hàng trống</td>
</tr>
<?php
}
?>
  </table>
</div>
<style type="text/css">
  .col-md-4.hinhthucthanhtoan .form-check {
    margin: 11px;
  }
</style>
  <div class="col-md-4 hinhthucthanhtoan">
    <h4>Phương thức thanh toán</h4>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="tien mat" checked>
      <img src="images/tienmat.png" height ="30" width="30">
      <label class="form-check-label" for="exampleRadios1">
        Tiền mặt
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="payment" id="exampleRadios2" value="chuyen khoan" checked>
      <img src="images/chuyenkhoan.png" height ="30" width="30">
      <label class="form-check-label" for="exampleRadios2">
        Chuyển khoản
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="payment" id="exampleRadios3" value="momo" checked>
      <img src="images/momo.png" height ="30" width="30">
      <label class="form-check-label" for="exampleRadios3">
        Momo
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="payment" id="exampleRadios4" value="vnpay" checked>
      <img src="images/vnpay.png.webp" height ="30" width="30">
      <label class="form-check-label" for="exampleRadios4">
        Vnpay
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="payment" id="exampleRadios5" value="paypal" checked>
      <img src="images/paypal.png" height ="30" width="30">
      <label class="form-check-label" for="exampleRadios5">
        Paypal
      </label>
    </div> 
    <input type="submit" name="thanhtoanngay" value="Thanh toán ngay" name="redirect" class="btn btn-danger">
  </div>
</div>
</form>