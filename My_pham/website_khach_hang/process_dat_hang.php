<?php session_start();
	if(empty($_SESSION)){
		header("location:website_ban_hang.php");
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
			if(empty($_SESSION['gio_hang']) && empty($_SESSION['ma_khach_hang'])){
				header("location:website_khach_hang.php");
			}
			else{
				if (isset($_POST['xu_ly_dat_hang'])) {
				
					$ma_khach_hang=$_SESSION['ma_khach_hang'];
					$ten_nguoi_nhan=$_POST['ten_nguoi_nhan'];
					$sdt_nguoi_nhan=$_POST['sdt_nguoi_nhan'];
					$dia_chi_nguoi_nhan=$_POST['dia_chi_nguoi_nhan'];
					$thoi_gian_dat_hang=date('Y-m-d H:i:s');

					require('connect_database.php');

					foreach ($_SESSION['gio_hang'] as $ma_san_pham => $san_pham) { 
						$so_luong = $san_pham['so_luong'];
						$query="select so_luong_ton_kho from san_pham where ma_san_pham='$ma_san_pham'";
						$result=mysqli_query($connect,$query);
						$row=mysqli_fetch_array($result);
						
						if ($so_luong>($row['so_luong_ton_kho'])) {

							header("location:gio_hang.php?qua_so_luong={$row['so_luong_ton_kho']}");
						}
					}

					$query  = "select max(ma_hoa_don) from hoa_don";
					$result = mysqli_query($connect,$query);
					$row    = mysqli_fetch_array($result);

					if(isset($row['max(ma_hoa_don)'])){
						$ma_hoa_don = $row['max(ma_hoa_don)']+1;
					}
					else{
						$ma_hoa_don = 1;
					}

					$ma_khach_hang = $_SESSION['ma_khach_hang'];

					$tong_tien = 0;
					foreach ($_SESSION['gio_hang'] as $ma_san_pham => $san_pham) { 
						$tong_tien = $tong_tien + ($san_pham['gia']*$san_pham['so_luong']);
					}

					$query = "insert into hoa_don
					(ma_hoa_don,ma_khach_hang,thoi_gian_dat_hang,thanh_tien,tinh_trang,nguoi_nhan,sdt_nguoi_nhan,dia_chi)
					values
					('$ma_hoa_don','$ma_khach_hang','$thoi_gian_dat_hang','$tong_tien','1','$ten_nguoi_nhan','$sdt_nguoi_nhan','$dia_chi_nguoi_nhan')";
					mysqli_query($connect,$query);
					$error=mysqli_error($connect);
					print_r($error);
					if (!empty($error)) {
						echo "<script>window.history.back()</script>";
					}

					foreach ($_SESSION['gio_hang'] as $ma_san_pham => $san_pham) { 
						$so_luong = $san_pham['so_luong'];
						$query = "insert into hoa_don_chi_tiet
						(ma_hoa_don,ma_san_pham,so_luong)
						values
						('$ma_hoa_don','$ma_san_pham','$so_luong')";
						mysqli_query($connect,$query);
						
					}
					
					mysqli_close($connect);
					unset($_SESSION['gio_hang']);
					header("location:gio_hang.php?success");
				}
				else{
					echo "<script>window.history.back()</script>";
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
				
				<div class="main_content">

					<!-- Products -->

					<div class="products_iso">
						<div class="row">
							<div class="col">
								<form action="" method="post">
						<input type="hidden" readonly name="ma_san_pham" value="<?php echo $ma_khach_hang ?>"><br>
						<table>
							
						<tr>
							<td>Họ và tên:</td>
							<td><input type='text' value="<?php echo $ten_khach_hang ?>"></td>
						</tr>
						<tr>
							<td>Email:</td>
							<td><input type='email' readonly style='background:#f1f1f1;' value="<?php echo $email ?>"></td>
						</tr>
						<tr>
							<td>Số điện thoại:</td>
							<td><input type='text' readonly style='background:#f1f1f1;' value="<?php echo $sdt ?>"></td>
						</tr>
						
						<tr>
							<td>Địa chỉ:</td>
							<td><textarea name="dia_chi"><?php echo $dia_chi ?></textarea></td>
						</tr>
						</table>
						</form>
					</div>
				</div>
			</div>
			<div class="main_content">

					<!-- Products -->

					<div class="products_iso">
						<div class="row">
							<div class="col">
								<form action="" method="post">
						<input type="hidden" readonly name="ma_san_pham" value="<?php echo $ma_khach_hang ?>"><br>
						<table>
							
						<tr>
							<td>Họ và tên:</td>
							<td><input type='text' value="<?php echo $ten_khach_hang ?>"></td>
						</tr>
						<tr>
							<td>Email:</td>
							<td><input type='email' readonly style='background:#f1f1f1;' value="<?php echo $email ?>"></td>
						</tr>
						<tr>
							<td>Số điện thoại:</td>
							<td><input type='text' readonly style='background:#f1f1f1;' value="<?php echo $sdt ?>"></td>
						</tr>
						
						<tr>
							<td>Địa chỉ:</td>
							<td><textarea name="dia_chi"><?php echo $dia_chi ?></textarea></td>
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
</div>
		
	</div>

</body>
</html>