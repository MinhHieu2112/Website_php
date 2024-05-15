<p>Chi tiết đơn hàng đã đặt</p>
<?php 
if(isset($_GET['quanly'])){
    $progressbarvalue = $_GET['quanly'];
}
?>
<?php
if(isset($_SESSION['cart'])){
    header('Location:index.php');
}
?>
<div class="container">
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">

    <div class="step done"> <span> <a href="index.php?quanly=giohang">Giỏ hàng</a></span> </div>
    <div class="step done"> <span><a href="index.php?quanly=vanchuyen">Vận chuyển</a></span> </div>
    <div class="step done"> <span><a href="index.php?quanly=thanhtoan">Thanh toán</a><span> </div>
    <div class="step current"> <span><a href="index.php?quanly=donhangdadat">Lịch sử đơn hàng</a><span> </div>
  </div>
  <!-- end Responsive Arrow Progress Bar -->
  <div class="clearfix">
   
    <a href="index.php?quanly=giohang" data-progressbarvalue="<?php echo $progressbarvalue ?>" class="next">Trước</a>
  </div>
</div>