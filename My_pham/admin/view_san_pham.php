<?php
	require 'kiem_tra_admin.php';
?>
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Colo Shop Categories</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
<link rel="icon" type="images/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSc1v9lUt7z055tlro2f9kICa8yNLz6-Sg8GGJLhstr1ptP1Xpm-g">
<link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="../plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="../styles/categories_styles.css">
<link rel="stylesheet" type="text/css" href="../styles/categories_responsive.css">
<link rel="stylesheet" type="text/css" href="../styles/search.css">
<style type="text/css">
	.dropdown img{
		width: 25px;
		height: 25px;
	}
	img{
		height: 100px;
		width: 100px;
	}
</style>
</head>

<body>
	<?php require('connect_database.php');
		$tim_kiem = "";
		if(isset($_GET['tim_kiem'])){
			$tim_kiem = $_GET['tim_kiem'];
		}

		//vào trang đầu tiên
		$trang = 1;
		if(isset($_GET['trang'])){
			$trang = $_GET['trang'];
		}
		//số sp hiển thị trên 1 trang
		$limit = 5;

		//số sản phẩm bỏ qua
		$offset = ($trang-1)*$limit;


		//câu lệnh lấy sản phẩm trong 1 trang
		$query="select*from san_pham 
				join nha_san_xuat on san_pham.ma_nha_san_xuat=nha_san_xuat.ma_nha_san_xuat
				join danh_muc on san_pham.ma_danh_muc=danh_muc.ma_danh_muc
				where ten_san_pham like '%$tim_kiem%' or ten_nha_san_xuat like '%$tim_kiem%'
				limit $limit offset $offset";
		$result =mysqli_query($connect,$query);
		//lấy tổng số sản phẩm
		$query_count  = "select count(*) from san_pham 
				join nha_san_xuat on san_pham.ma_nha_san_xuat=nha_san_xuat.ma_nha_san_xuat
				join danh_muc on san_pham.ma_danh_muc=danh_muc.ma_danh_muc
				where ten_san_pham like '%$tim_kiem%' or ten_nha_san_xuat like '%$tim_kiem%'";
		$result_count = mysqli_query($connect,$query_count);
		$row_count    = mysqli_fetch_array($result_count);
		$count        = $row_count['count(*)'];
		//số trang
		$so_trang = ceil($count/$limit);

	
		
	?>

<div class="super_container">

	<!-- Header -->

	<header class="header trans_300">

		<!-- Top Navigation -->

		<!-- Main Navigation -->

		<?php
			include 'main_navigation_admin.php';
		?>

	<div class="container product_section_container">
		<div class="row">
			<div class="col product_section clearfix">

				<!-- Breadcrumbs -->
				<div class="main_content">

					<!-- Products -->

					<div class="products_iso">
						<div class="row">
							<div class="col">
								<div class="product_sorting_container product_sorting_container_top">
									<div class="pages d-flex flex-row align-items-center">
										<?php for($i=1; $i<=$so_trang; $i++){ ?>
											<a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>"><?php echo "<div class='page_current'>
											<span>".$i."</span>
										</div>" ?></a>
										<?php } ?>

										
										<div class="page_total"><span>of</span> <?php echo $so_trang ?></div>
									</div>
									<div class="pages d-flex flex-row align-items-center">
										<?php if(isset($_GET['tim_kiem'])){
											echo "<h6>Có ".$count." sản phẩm được tìm thấy     </h6>";
										}
									 ?>
									</div>

									

								</div>
						

						<!-- Product 2 -->

	<?php
	if (isset($_GET['ma_san_pham_update'])) {
		include('update_form_san_pham.php');
	} 
	elseif (isset($_GET['insert_form_san_pham'])) {
		include('insert_form_san_pham.php');
	}
	else {
	?>
	<table border="1" width="1100px" style="text-align: center;">
		<tr>
			<th colspan="12"><a href="view_san_pham.php?insert_form_san_pham"><button style="margin-bottom: 10px; margin-top: 10px;">Thêm sản phẩm</button></a></th>
		</tr>
		<tr>
			<th>Mã SP</th>
			<th>Tên SP</th>
			<th>Giá</th>
			<th>Mô tả</th>
			<th>Ảnh</th>
			<th>Thời gian nhập hàng</th>
			<th>Số lượng đã nhập</th>
			<th>Số lượng còn trong kho</th>
			<th>Nhà sản xuất</th>
			<th>Danh mục</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
		<?php
			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<td>".$row['ma_san_pham']."</td>";
				echo "<td>".$row['ten_san_pham']."</td>";
				echo "<td>".$row['gia']."</td>";
				echo "<td>".$row['mo_ta']."</td>";
				echo "<td><img src='".$row['anh']."'></td>";
				echo "<td>".$row['thoi_gian_nhap_hang']."</td>";
				echo "<td>".$row['so_luong_da_nhap']."</td>";
				echo "<td>".$row['so_luong_ton_kho']."</td>";
				echo "<td>".$row['ten_nha_san_xuat']."</td>";
				echo "<td>".$row['ten_danh_muc']."</td>";
				echo "<td><a href='view_san_pham.php?ma_san_pham_update=".$row['ma_san_pham']."'><button>Sửa</button></a></td>";
				echo "<td><a href='delete_san_pham.php?ma_san_pham=".$row['ma_san_pham']."'><button>Xóa</button></a></td>";
				echo "</tr>";
			}
		?>
	</table>

	<?php
		if (isset($_GET['success_insert'])) {
			echo '<script language="javascript">';
			echo 'alert("Thêm thành công")';
			echo '</script>';
		}
		elseif (isset($_GET['error_insert'])) {
			echo '<script language="javascript">';
			echo 'alert("Thêm thất bại")';
			echo '</script>';
		}
		elseif (isset($_GET['dien_thieu'])) {
			echo '<script language="javascript">';
			echo 'alert("Bạn phải điền đầy đủ thông tin")';
			echo '</script>';
		}
		elseif (isset($_GET['success_update'])) {
			echo '<script language="javascript">';
			echo 'alert("Sửa thành công")';
			echo '</script>';
		}
		elseif (isset($_GET['error_update'])) {
			echo '<script language="javascript">';
			echo 'alert("Sửa thất bại")';
			echo '</script>';
		}
		elseif (isset($_GET['error_update_anh_moi'])) {
			echo '<script language="javascript">';
			echo 'alert("Không tải được ảnh mới")';
			echo '</script>';
		}
		elseif (isset($_GET['success_delete'])) {
			echo '<script language="javascript">';
			echo 'alert("Xóa thành công")';
			echo '</script>';
		}
		elseif (isset($_GET['error_delete'])) {
			echo '<script language="javascript">';
			echo 'alert("Xóa không thành công")';
			echo '</script>';
		}
	}
	?>

	</div>
		</div>
</div>
</div>
</div>
</div>
</div>
</div>
	<?php
		include 'footer.php';
	?>
</div>

	<!-- Benefit -->

<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../styles/bootstrap4/popper.js"></script>
<script src="../styles/bootstrap4/bootstrap.min.js"></script>
<script src="../plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../plugins/easing/easing.js"></script>
<script src="../plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="../js/categories_custom.js"></script>
</body>

</html>
