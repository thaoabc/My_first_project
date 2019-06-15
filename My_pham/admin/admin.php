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
	table{
			margin: auto;
		}
</style>
</head>
<body>
	<div class="super_container">

	<!-- Header -->

	<header class="header trans_300">

		<!-- Top Navigation -->

		<!-- Main Navigation -->

		<?php
			include 'main_navigation_admin.php';
		?>

	<div class="container product_section_container">
	<?php
	if (isset($_GET['view'])) {
		include('thong_tin_admin.php');
	} 
	elseif (isset($_GET['sua_thong_tin'])) {
		include('form_update_thong_tin.php');
	}
	elseif (isset($_GET['doi_mat_khau'])) {
		include('form_update_mat_khau.php');
	}
	else {
		
	?>
	<?php
		require('connect_database.php');
		$ma_admin = $_SESSION['ma_admin'];
		$query         = "select * from admin where ma_admin = '$ma_admin'";
		$result = mysqli_query($connect,$query);
		$error=mysqli_error($connect);
		$row    = mysqli_fetch_array($result);

	?>

	<!-- Header -->

			<div class="row">
				<div class="col product_section clearfix">

					<!-- Breadcrumbs -->

					<div >
						<table style="text-align: center;">
							<tr >
								<td style="padding-right: 15px"><a href="?view"><button>Thông tin tài khoản</button></a></td>
								<td style="padding-right: 15px"><a href="?sua_thong_tin"><button>Sửa thông tin</button></a></td>
								<td><a href="?doi_mat_khau"><button>Đổi mật khẩu</button></a></td>
							</tr>
						</table>
					</div>
				
				<div style="float: left;" class="main_content">

					<!-- Products -->

					<div class="products_iso">
						<div class="row">
							<div class="col">
								
									<input type="hidden" readonly name="ma_admin" value="<?php echo $row['ma_admin'] ?>"><br>
									<table>
									<tr>
										<td>Họ và tên:</td>
										<td><input type='text' value="<?php echo $row['ten_admin'] ?>"></td>
									</tr>
									<tr>
										<td>Email:</td>
										<td><input type='email' readonly style='background:#f1f1f1;' value="<?php echo $row['email'] ?>"></td>
									</tr>
									<tr>
										<td>Số điện thoại:</td>
										<td><input type='text' readonly style='background:#f1f1f1;' value="<?php echo $row['sdt'] ?>"></td>
									</tr>
									<tr>
										<td>Địa chỉ:</td>
										<td><textarea name="dia_chi"><?php echo $row['dia_chi'] ?></textarea></td>
									</tr>
									<tr>
										<td>Giới tính:</td>
										<?php 
											if($row['gioi_tinh']==0){
											echo "<td><input type='radio' name='gioi_tinh' checked value='0'>Nữ<input type='radio' name='gioi_tinh' value='1'>Nam</td></tr>";
										}
										else{
											echo "<td><input type='radio' name='gioi_tinh' value='0'>Nữ<input type='radio' name='gioi_tinh' checked value='1'>Nam</td></tr>";
										}
										?>
									<tr>
										<td>Cấp độ:</td>
										<?php 
											if($row['cap_do']==1){
											echo "<td><input type='text' readonly style='background:#f1f1f1;' value='SuperAdmin'></td>";
										}
										else{
											echo "<td><input type='text' readonly style='background:#f1f1f1;' value='Admin'></td>";
										}
										?>
									</tr>
								</table>
								
							</div>
						</div>
					</div>
				</div>
			
			
		</div>
	</div>
	<?php
		mysqli_close($connect);
	?>

</div>
	<?php
		include 'footer.php';
	?>
	<?php 
	if (isset($_GET['dien_thieu'])) {
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
		elseif (isset($_GET['success_password'])) {
			echo '<script language="javascript">';
			echo 'alert("Mật khẩu được đã được đổi")';
			echo '</script>';
		}
		elseif (isset($_GET['error_password'])) {
			echo '<script language="javascript">';
			echo 'alert("Lỗi đổi mật khẩu")';
			echo '</script>';
		}
		elseif (isset($_GET['khong_trung_mat_khau'])) {
			echo '<script language="javascript">';
			echo 'alert("Hai mật khẩu mới phải trùng nhau")';
			echo '</script>';
		}
		elseif (isset($_GET['sai_mat_khau'])) {
			echo '<script language="javascript">';
			echo 'alert("Điền sai mật khẩu cũ")';
			echo '</script>';
		}
	}
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
