<?php session_start();
	if(empty($_SESSION['ma_khach_hang'])){
		header("location:website_ban_hang.php");
	}
	if (!isset($_GET['dat_hang'])) {
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
		img{
			height: 235px;
			width: 235px;
		}
	</style>
	<style type="text/css">
		input{
			/*width: 400px;*/
			height: 30px;
			padding-left: 10px;
			margin-left: 20px;
			margin-top: 10px;
		}
		table{
			margin-top: 50px;
			margin-left: 50px;
		}

	</style>
</head>
<body>
	<?php
		if(isset($_COOKIE['$row[\'ma_khach_hang\']'])&&isset($_SESSION['gio_hang'])){
			$ma = $_COOKIE['$row[\'ma_khach_hang\']'];
			require('connect_database.php');
			$query = "select * from khach_hang where ma_khach_hang = '$ma'";
			$result = mysqli_query($connect,$query);
			
			$count = mysqli_num_rows($result);
			if($count==0){
				header('location:sign_up.php?error_cookie');
			}
			else{
				$row          = mysqli_fetch_array($result);

				$_SESSION['ma_khach_hang']  = $row['ma_khach_hang'];
				$_SESSION['ten_khach_hang'] = $row['ten_khach_hang'];
				$_SESSION['email']          = $row['email'];
				$_SESSION['sdt']          = $row['sdt'];
				$_SESSION['ngay_sinh']          = $row['ngay_sinh'];
				$_SESSION['gioi_tinh']          = $row['gioi_tinh'];
				$_SESSION['mat_khau']       = $row['mat_khau'];

				$ma_khach_hang=$_SESSION['ma_khach_hang'];
				$ten_khach_hang=$_SESSION['ten_khach_hang'];
				$sdt=$_SESSION['sdt'];
				$email=$_SESSION['email'];
				$mat_khau=$_SESSION['mat_khau'];
				$ngay_sinh=$_SESSION['ngay_sinh'];
				$dia_chi=$_SESSION['dia_chi'];
				$gioi_tinh=$_SESSION['gioi_tinh'];
			}
		}
		else{
			if(empty($_SESSION['gio_hang']) && empty($_SESSION['ma_khach_hang'])){
				header("location:website_khach_hang.php");
			}
			else{
				require('connect_database.php');
				$ma_khach_hang = $_SESSION['ma_khach_hang'];
				$query         = "select * from khach_hang where ma_khach_hang = '$ma_khach_hang'";
				$result = mysqli_query($connect,$query);
				$error=mysqli_error($connect);
				$row    = mysqli_fetch_array($result);

				$ma_khach_hang=$row['ma_khach_hang'];
				$ten_khach_hang=$row['ten_khach_hang'];
				$sdt=$row['sdt'];
				$dia_chi=$row['dia_chi'];
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
							<li><a href="index.html"></a></li>
							
						</ul>
					</div>
				
				<div style="float: left;" class="main_content">

					<!-- Products -->

					<div  class="main_content">

					<!-- Products -->

					<div class="products_iso">
						<div class="row">
							<div class="col">
								<form style="padding-right: 0px" action="process_dat_hang.php" method="post">
						<input type="hidden" readonly name="ma_san_pham" value="<?php echo $ma_khach_hang ?>"><br>
						<table style="text-align: left;">
							
						<tr>
							<td>Họ và tên:</td>
							<td><input type='text' name="ten_nguoi_nhan" value="<?php echo $ten_khach_hang ?>"></td>
						</tr>
						<tr>
							<td>Số điện thoại:</td>
							<td><input type='text' name="sdt_nguoi_nhan" value="<?php echo $sdt ?>"></td>
						</tr>
						
						<tr>
							<td>Địa chỉ:</td>
							<td><textarea name="dia_chi_nguoi_nhan"><?php echo $dia_chi ?></textarea></td>
						</tr>
						<tr>
							<td>
								<button name="xu_ly_dat_hang" value="1">Đặt Hàng</button>
							</td>
						</tr>

						</table>
						</form>
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

</body>
</html>