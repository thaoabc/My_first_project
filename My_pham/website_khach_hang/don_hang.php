<?php session_start();
	if(empty($_SESSION['ma_khach_hang'])){
		header("location:website_ban_hang.php");
	}
	if (!isset($_GET['don_hang'])) {
		header("location:categories.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thông tin khách hàng</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Colo Shop Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link rel="icon" type="images/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSc1v9lUt7z055tlro2f9kICa8yNLz6-Sg8GGJLhstr1ptP1Xpm-g">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="styles/categories_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
	<link rel="stylesheet" type="text/css" href="styles/search.css">
	<style type="text/css">
		.dropdown img{
			width: 25px;
			height: 25px;
		}

		tr:hover{
			background-color: #E6E6E6;
		}
	</style>
</head>
<body>
	<?php
		if(isset($_COOKIE['$row[\'ma_khach_hang\']'])){
			$ma = $_COOKIE['$row[\'ma_khach_hang\']'];
			require('connect_database.php');
			$query_khach_hang="select*from khach_hang where ma_khach_hang='$ma'";
			$result_khach_hang = mysqli_query($connect,$query_khach_hang);
			$row_khach_hang = mysqli_fetch_array($result_khach_hang);
			$ten_khach_hang=$row_khach_hang['ten_khach_hang'];


			$query = "select*from khach_hang
					join hoa_don on khach_hang.ma_khach_hang=hoa_don.ma_khach_hang
					join hoa_don_chi_tiet on hoa_don.ma_hoa_don=hoa_don_chi_tiet.ma_hoa_don
					join san_pham on san_pham.ma_san_pham=hoa_don_chi_tiet.ma_san_pham
					where ten_khach_hang = '$ten_khach_hang'
					order by thoi_gian_dat_hang";
			$result = mysqli_query($connect,$query);
			$array_khach_hang = array();	
			$count = mysqli_num_rows($result);
			if($count==0){
				header('location:sign_up.php?error_cookie');
			}
			else{
				while($row = mysqli_fetch_array($result)){
					$ma_khach_hang=$row['ma_khach_hang'];
					$ma_hoa_don=$row['ma_hoa_don'];

					$array_khach_hang[$ma_hoa_don]['thoi_gian_dat_hang']=$row['thoi_gian_dat_hang'];
					$array_khach_hang[$ma_hoa_don]['thanh_tien']=$row['thanh_tien'];
					$array_khach_hang[$ma_hoa_don]['tinh_trang']=$row['tinh_trang'];

					$ma_san_pham=$row['ma_san_pham'];

					$array_khach_hang[$ma_hoa_don]['san_pham'][$ma_san_pham]['ten_san_pham']=$row['ten_san_pham'];
					$array_khach_hang[$ma_hoa_don]['san_pham'][$ma_san_pham]['so_luong']=$row['so_luong'];
				}
			}
		}
		else{
			if(empty($_SESSION['ma_khach_hang'])){
				header("location:website_khach_hang.php");
			}
			else{
				$ma_khach_hang=$_SESSION['ma_khach_hang'];
				require('connect_database.php');
				$query_khach_hang="select*from khach_hang where ma_khach_hang='$ma_khach_hang'";
				$result_khach_hang = mysqli_query($connect,$query_khach_hang);
				$row_khach_hang = mysqli_fetch_array($result_khach_hang);
				$ten_khach_hang=$row_khach_hang['ten_khach_hang'];

				$query = "select*from khach_hang
					join hoa_don on khach_hang.ma_khach_hang=hoa_don.ma_khach_hang
					join hoa_don_chi_tiet on hoa_don.ma_hoa_don=hoa_don_chi_tiet.ma_hoa_don
					join san_pham on san_pham.ma_san_pham=hoa_don_chi_tiet.ma_san_pham
					where ten_khach_hang = '$ten_khach_hang'
					order by thoi_gian_dat_hang";
				$result = mysqli_query($connect,$query);
				$array_khach_hang = array();
				
				while($row = mysqli_fetch_array($result)){
					$ma_khach_hang=$row['ma_khach_hang'];
					$ma_hoa_don=$row['ma_hoa_don'];

					$array_khach_hang[$ma_hoa_don]['thoi_gian_dat_hang']=$row['thoi_gian_dat_hang'];
					$array_khach_hang[$ma_hoa_don]['thanh_tien']=$row['thanh_tien'];
					$array_khach_hang[$ma_hoa_don]['tinh_trang']=$row['tinh_trang'];

					$ma_san_pham=$row['ma_san_pham'];
					
					$array_khach_hang[$ma_hoa_don]['san_pham'][$ma_san_pham]['ten_san_pham']=$row['ten_san_pham'];
					$array_khach_hang[$ma_hoa_don]['san_pham'][$ma_san_pham]['so_luong']=$row['so_luong'];
				}
				}
			}
		
	?>
	<div class="super_container">

	<!-- Header -->

	<header class="header trans_300">

		<!-- Top Navigation -->

		<!-- Main Navigation -->

		<?php
			include 'main_navigation.php';
		?>
		<div class="container product_section_container">
			<div class="row">
				<div class="col product_section clearfix">

					<!-- Breadcrumbs -->

					<div class="breadcrumbs d-flex flex-row align-items-center">
						<ul>
							<li><a href="index.php"></a></li>
							
						</ul>
					</div>
				
				<div style="float: left;" class="main_content">

					<!-- Products -->

					<div  class="main_content">

					<!-- Products -->

					<div class="products_iso">
						<div class="row">
							<div class="col">
<table style="border-bottom-color: gray; width: 1100px">
		<tr style="height: 80px; color: gray">
			<th>Thời gian đặt hàng</th>
			<th>Sản Phẩm</th>
			<th>Tổng tiền</th>
			<th>Trạng thái đơn hàng</th>
		</tr>
		<?php foreach($array_khach_hang as $ma_hoa_don => $each_hoa_don){ ?>
			<tr style="height: 80px">
				<td><?php echo $each_hoa_don['thoi_gian_dat_hang'] ?></td>

				<td>
					<ul>
						<?php foreach ($each_hoa_don['san_pham'] as $each_san_pham) { ?>
							<li>
								<?php echo $each_san_pham['ten_san_pham'].":" ?>
								<?php echo "Số lượng(".$each_san_pham['so_luong'].")" ?>
							
							</li>
		
						<?php } ?>
					</ul>
					
				</td>
				<td>
					<?php echo $each_hoa_don['thanh_tien']." VND" ?>
				</td>
				<td>
					<?php if ($each_hoa_don['tinh_trang']==1) {
							echo "Chưa duyệt<br><a href='huy_don.php?ma_hoa_don=$ma_hoa_don'><button onclick='kiem_tra()' name='huy_don_hang' values='1'>Hủy đơn</button>"; ?>
							<script>
							function kiem_tra() {
							  confirm("Bạn có chắc muốn hủy đơn hàng này!");
							}
							</script>
						<?php } 
						elseif ($each_hoa_don['tinh_trang']==2) {
							echo "Đã duyệt";
						}
						else{
							echo "Đã hủy";
						}
					 ?>
				</td>
			</tr>
		<?php } ?>
	</table>
	<?php
		mysqli_close($connect);
	?>
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
	if (isset($_GET['da_huy'])) {
		echo "<script language='javascript'>
			alert('Đơn hàng đã được hủy');
			</script>";
	}
?>

</body>
</html>