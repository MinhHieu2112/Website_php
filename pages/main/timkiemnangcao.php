<?php
    // Xác định biến tìm kiếm
    $tukhoa = isset($_POST['tukhoa']) ? $_POST['tukhoa'] : '';

    // Xác định biến tìm kiếm nâng cao
    $min_price = isset($_POST['min_price']) ? $_POST['min_price'] : null;
    $max_price = isset($_POST['max_price']) ? $_POST['max_price'] : null;
    $category = isset($_POST['category']) ? $_POST['category'] : '';

    // Xây dựng câu truy vấn SQL cho tìm kiếm nâng cao
    $sql_pro = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc";

    // Thêm điều kiện tìm kiếm cho tên sản phẩm
    if (!empty($tukhoa)) {
        $sql_pro .= " AND tbl_sanpham.tensanpham LIKE '%$tukhoa%'";
    }

    // Thêm điều kiện tìm kiếm cho khoảng giá
    if (!empty($min_price) && !empty($max_price)) {
        $sql_pro .= " AND tbl_sanpham.giasp BETWEEN $min_price AND $max_price";
    }

    // Thêm điều kiện tìm kiếm cho thể loại
    if (!empty($category)) {
        $sql_pro .= " AND tbl_sanpham.id_danhmuc = $category";
    }

    // Thực hiện truy vấn
    $query_pro = mysqli_query($mysqli, $sql_pro);
?>
<!-- Hiển thị kết quả tìm kiếm -->
<h3>Từ khoá tìm kiếm : <?php echo $tukhoa; ?></h3>
<ul class="product_list">
    <?php 
    while ($row = mysqli_fetch_array($query_pro)) {
    ?>
    <li>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham']; ?>">
            <img src="admincp/modules/quanlysp/upload/<?php echo $row['hinhanh']; ?>">
            <p class="title_product"><?php echo $row['tensanpham']; ?></p>
            <p class="price_product">Giá: <?php echo number_format($row['giasp'], 0, ',', '.') . '₫'; ?></p> 
            <p style="text-align: center;color:#d1d1d1"><?php echo $row['tendanhmuc']; ?></p>
        </a>
    </li>
    <?php
    }
    ?>
</ul>
