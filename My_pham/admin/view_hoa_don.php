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

	table{
			margin: auto;
			text-align: center;
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
		$limit = 1;

		//số sản phẩm bỏ qua
		$offset = ($trang-1)*$limit;


		//câu lệnh lấy sản phẩm trong 1 trang
		$query="select*from khach_hang
			join hoa_don on khach_hang.ma_khach_hang=hoa_don
			.ma_khach_hang
			join hoa_don_chi_tiet on hoa_don.ma_hoa_don=hoa_don_chi_tiet.ma_hoa_don
			join san_pham on san_pham.ma_san_pham=hoa_don_chi_tiet.ma_san_pham
			where tinh_trang=1 and (ten_khach_hang like '%$tim_kiem%' or sdt like '%$tim_kiem%' or thoi_gian_dat_hang like '%$tim_kiem%')
			order by thoi_gian_dat_hang
			limit $limit offset $offset";
		$result=mysqli_query($connect,$query);
		//lấy tổng số sản phẩm
		$query_count  = "select count(*) from khach_hang
			join hoa_don on khach_hang.ma_khach_hang=hoa_don
			.ma_khach_hang
			join hoa_don_chi_tiet on hoa_don.ma_hoa_don=hoa_don_chi_tiet.ma_hoa_don
			join san_pham on san_pham.ma_san_pham=hoa_don_chi_tiet.ma_san_pham
			where tinh_trang=1 and (ten_khach_hang like '%$tim_kiem%' or sdt like '%$tim_kiem%' or thoi_gian_dat_hang like '%$tim_kiem%')
			order by thoi_gian_dat_hang";
		$result_count = mysqli_query($connect,$query_count);
		$row_count    = mysqli_fetch_array($result_count);
		$count        = $row_count['count(*)'];
		//số trang
		$so_trang = ceil($count/$limit);

		mysqli_close($connect);
		
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
											echo "<h6>Có ".$count." đơn hàng được tìm thấy     </h6>";
										}
									 ?>
									</div>

									

								</div>
						

						<!-- Product 2 -->

	<?php
		
		$array_hoa_don = array();
		while($row = mysqli_fetch_array($result)){
			$ma_hoa_don=$row['ma_hoa_don'];
			$array_hoa_don[$ma_hoa_don]['thoi_gian_dat_hang']=$row['thoi_gian_dat_hang'];
			$array_hoa_don[$ma_hoa_don]['ten_khach_hang']=$row['ten_khach_hang'];
			$array_hoa_don[$ma_hoa_don]['dia_chi']=$row['dia_chi'];
			$array_hoa_don[$ma_hoa_don]['sdt']=$row['sdt'];
			$array_hoa_don[$ma_hoa_don]['thanh_tien']=$row['thanh_tien'];

			$ma_san_pham=$row['ma_san_pham'];
			$array_hoa_don[$ma_hoa_don]['san_pham'][$ma_san_pham]['ten_san_pham']=$row['ten_san_pham'];
			$array_hoa_don[$ma_hoa_don]['san_pham'][$ma_san_pham]['gia']=$row['gia'];
			$array_hoa_don[$ma_hoa_don]['san_pham'][$ma_san_pham]['so_luong']=$row['so_luong'];
		}
		
	?>
		
	<table border="1" width="100%">
		<tr>
			<th>Thời gian đặt hàng</th>
			<th>Khách Hàng</th>
			<th>Sản Phẩm</th>
			<th>Duyệt</th>
			<th>Hủy</th>
		</tr>
		<?php foreach($array_hoa_don as $ma_hoa_don => $each_hoa_don){ ?>
			<tr>
				<td><?php echo $each_hoa_don['thoi_gian_dat_hang'] ?></td>
				<td>
					<?php echo $each_hoa_don['ten_khach_hang'] ?>
					<br>
					<?php echo "SĐT: ".$each_hoa_don['sdt'] ?>
					<br>
					<?php echo "Địa chỉ: ".$each_hoa_don['dia_chi'] ?>
				</td>
				<td>
					<ul>
						<?php foreach ($each_hoa_don['san_pham'] as $each_san_pham) { ?>
							<li>
								<?php echo $each_san_pham['ten_san_pham'] ?>
								(<?php echo $each_san_pham['gia']." VND" ?>)
								:
								
								<?php echo "Số lượng(".$each_san_pham['so_luong'].")" ?>
							
							</li>
		
						<?php } ?>
					</ul>
					<b>Tổng tiền:</b> <?php echo $each_hoa_don['thanh_tien']." VND" ?>
				</td>
				<td>
					<a href="thay_doi_tinh_trang.php?ma_hoa_don=<?php echo $ma_hoa_don?>&kieu=duyet">
						<input type="text" style="width: 50px;text-align: center;background-color: #f1f1f1;" readonly name="" value="Duyệt">
					</a>
				</td>
				<td>
					<a href="thay_doi_tinh_trang.php?ma_hoa_don=<?php echo $ma_hoa_don?>&kieu=huy">
						<input type="text" style="width: 50px;text-align: center;background-color: #f1f1f1;" readonly name="" value="Hủy">
					</a>
				</td>
			</tr>
		<?php } ?>
	</table>
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
<?php
	if (isset($_GET['ma_san_pham'])) {
		$ma_san_pham_het=$_GET['ma_san_pham'];
		echo "<script language='javascript'>
			alert('Hàng tồn kho của sản phẩm ".$ma_san_pham_het." không đủ');
			</script>";
	}
?>
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
