<p style style="text-align: center;text-transform: uppercase"> Tin tức mới nhất</p>
<?php
    $sql_bv = "SELECT * FROM tbl_baiviet WHERE tbl_baiviet.id_danhmuc='$_GET[id]' ORDER BY id DESC";
    $query_bv = mysqli_query($mysqli,$sql_bv);
?>
<div class="row">
   
        <?php 
        while($row_bv = mysqli_fetch_array($query_bv)){
        ?>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <a href="index.php?quanly=baiviet&id=<?php echo $row_bv['id']?>">
            <img src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh'] ?>">
            <p class="title_product">Tên bài viết :<?php echo $row_bv['tenbaiviet'] ?> </p>
            </a>
        </div>
        <?php
        }
        ?>

</div>