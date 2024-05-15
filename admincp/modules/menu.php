<!-- <ul class="admincp_list">
    <li><a href="index.php" style="color: antiquewhite;"><b>Thống kê</b></a></li>
    <li><a href="index.php?action=quanlydanhmucsanpham&query=them" style="color: antiquewhite;"><b>Quản lý danh mục sản phẩm</b></a></li>
    <li><a href="index.php?action=quanlysp&query=them" style="color: antiquewhite;"><b>Quản lý sản phẩm</b></a></li>
    <li><a href="index.php?action=quanlydanhmucbaiviet&query=them" style="color: antiquewhite;"><b>Quản lý danh mục bài viết</b></a></li>
    <li><a href="index.php?action=quanlybaiviet&query=them" style="color: antiquewhite;"><b>Quản lý bài viết</b></a></li>
    <li><a href="index.php?action=quanlydonhang&query=lietke" style="color: antiquewhite;"><b>Quản lý đơn hàng</b></a></li>
    <li><a href="index.php?action=quanlyweb&query=capnhat" style="color: antiquewhite;"><b>Quản lý website</b></a></li>
</ul> -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Welcome to admin</h2>
				</div>
			</div>
		</div>
		<div class="container">
			<nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" id="ftco-navbar">
		    <div class="container">
		    	<!-- <a class="navbar-brand" href="index.html">Digital</a> -->
		    	<div class="social-media order-lg-last">
		    		<!-- <p class="mb-0 d-flex">
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
		    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
		    		</p> -->
	        </div>
		      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="fa fa-bars"></span> Menu
		      </button>
		      <div class="collapse navbar-collapse" id="ftco-nav">
		        <ul class="navbar-nav ml-auto mr-md-auto">
		        	<li class="nav-item"><a href="index.php?action=quanlydanhmucsanpham&query=them" class="nav-link">Quản lý danh mục sản phẩm</a></li>
		        	<li class="nav-item"><a href="index.php?action=quanlysp&query=them" class="nav-link">Quản lý sản phẩm</a></li>
		        	<li class="nav-item"><a href="index.php?action=quanlydanhmucbaiviet&query=them" class="nav-link">Quản lý danh mục bài viết</a></li>
		        	<li class="nav-item"><a href="index.php?action=quanlybaiviet&query=them" class="nav-link">Quản lý bài viết</a></li>
                    <li class="nav-item"><a href="index.php?action=quanlydonhang&query=lietke" class="nav-link">Quản lý đơn hàng</a></li>
                    <li class="nav-item"><a href="index.php?action=quanlyweb&query=capnhat" class="nav-link">Quản lý website</a></li>
		          <li class="nav-item"><a href="index.php" class="nav-link">Thống kê</a></li>
                  <li class="nav-item active">
                  <?php

                        if(isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1){
                            unset($_SESSION['dangnhap']);
                            header('Location: login.php');
                        exit(); // Chắc chắn dừng việc thực thi script ngay tại đây
                    }
                    ?>
                    <a href="index.php?action=dangxuat&dangxuat=1" class="nav-link" >Đăng xuất : <?php if(isset($_SESSION['dangnhap'])){
                        echo $_SESSION['dangnhap'];
                    } ?></a>
                    </li>
		        </ul>
		      </div>
		    </div>
		  </nav>
    <!-- END nav -->
  </div>

	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>
