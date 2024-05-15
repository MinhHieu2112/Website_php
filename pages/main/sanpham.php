<?php
    $sql_chitiet = "SELECT * FROM tbl_sanpham, tbl_danhmuc 
                    WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc 
                    AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
    $query_chitiet = mysqli_query($mysqli,$sql_chitiet);
    while($row_chitiet = mysqli_fetch_array($query_chitiet)){
?>  
<div class = "wrapper_chitiet">
<div class = "hinhanh_sanpham">
    <img width="100%" src="admincp/modules/quanlysp/upload/<?php echo $row_chitiet['hinhanh'] ?>">
</div>

<form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
<div class = "chitiet_sanpham">
    <p style = "margin:0.1">Tên sản phẩm : <?php echo $row_chitiet['tensanpham'] ?></p>
    <p style = "margin:0.1">Mã sản phẩm : <?php echo $row_chitiet['masp'] ?></p>
    <p style = "margin:0.1">Giá : <?php echo number_format($row_chitiet['giasp'],0,',','.').'₫' ?></p>
    <p style = "margin:0.1">Số lượng tồn kho : <?php echo $row_chitiet['soluong'] ?></p>
    <p style = "margin:0.1">Thể loại : <?php echo $row_chitiet['tendanhmuc'] ?></p>
    <p style = "margin:0.1"><input class="themgiohang" name="themgiohang" type="submit" value="Thêm giỏ hàng"></p>
</div>
</form>

</div>
<div class = "clear"></div>
<!-- ENDS tabs-content -->
            <div class="tabs">
                <ul id="tabs-nav">
                    <li><a href="#chitiet">Đặc điểm nổi bật</a></li>
                    <li><a href="#noidung">Nội dung</a></li>
                    <li><a href="#hinhanh">Hình ảnh</a></li> 

                </ul>
                <div id="tabs-content">
                    <div id="chitiet" class="tab-content">
                        <?php echo $row_chitiet['tomtat'] ?>
                    </div>
                    <div id="noidung" class="tab-content">
                        <?php echo $row_chitiet['noidung'] ?>
                    </div>
                    <div id="hinhanh" class="tab-content">
                        <img width="100%" src="admincp/modules/quanlysp/upload/<?php echo $row_chitiet['hinhanh'] ?>"> 
                    </div>
                </div>
            </div>
<?php
    }
?>