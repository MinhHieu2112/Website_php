
<?php
    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
    }else{
        $page = '';
    }
    if($page == '' || $page == 1){
        $begin = 0;
    }else{
        $begin = ($page * 6) - 6; // số 6 là số sản phẩm muốn hiển thị của trang index
    }
    $sql_pro = "SELECT * FROM tbl_sanpham, tbl_danhmuc 
                WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc 
                ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,6";
    $query_pro = mysqli_query($mysqli,$sql_pro);
?>
<h3>Sản Phẩm Mới Nhất</h3>
    <div class = "row">
        <?php 
        while($row = mysqli_fetch_array($query_pro)){
        ?>
       <div class = "col-md-2">
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
            <img class="img img-responsive" width = "100%" src="admincp/modules/quanlysp/upload/<?php echo $row['hinhanh'] ?>">
            <p class="title_product"><?php echo $row['tensanpham'] ?> </p>
            <p class="price_product">Giá : <?php echo number_format($row['giasp'],0,',','.').'₫' ?></p> 
            <p style="text-align: center;color:#d1d1d1"><?php echo $row['tendanhmuc'] ?></p>
            </a>
        </div>
        <?php
        }
        ?>
    </div>
    <div style="clear:both;"></div>
    <style type = "text/css">
        ul.list_trang{
            padding:0;
            margin:0;
            list-style:none;
        }
        ul.list_trang li{
            float:left;
            padding:5px 10px;
            margin: 5px;
            background: burlywood;
            display : block;
        }
        ul.list_trang li a{
            color: #000;
            text-align: center;
            text-decoration: none;
        }
    </style>
   <?php
        $sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham");
        $row_count = mysqli_num_rows($sql_trang);
        $trang = ceil($row_count / 5);
    ?>

    <p>Trang hiện tại: <?php echo $page ?>/<?php echo $trang ?></p>

        <ul class="list_trang">
    <?php
        for($i = 1; $i <= $trang; $i++) {
    ?>
    <li <?php if($i==$page){ echo 'style="background:red"'; } ?>>
        <a href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a>
    </li>
    <?php
    }
    ?>
</ul>
