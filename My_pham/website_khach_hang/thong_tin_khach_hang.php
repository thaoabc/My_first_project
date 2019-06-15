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
			margin: auto;
		}
	</style>
</head>
<body>
	<div class="super_container">

	<!-- Header -->

	<header class="header trans_300">
		<?php include 'main_navigation.php';?>
		<div class="container product_section_container">
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
		
							<?php if (isset($_GET['view'])||isset($_GET['huy'])||isset($_GET['thong_tin_khach_hang'])) {
								include 'view_thong_tin_khach_hang.php';
							} 
							else if (isset($_GET['sua_thong_tin'])) {
								include 'form_update_thong_tin.php';
							}
							else if (isset($_GET['doi_mat_khau'])) {
								include 'form_update_mat_khau.php';
							}
							else if (isset($_GET['form_update_mat_khau_moi'])) {
								include 'form_update_mat_khau_moi.php';
								
							}
							
							else{
								if(isset($_COOKIE['$row[\'ma_khach_hang\']'])){
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
			if (isset($_SESSION['ma_khach_hang'])) {
		
			require('connect_database.php');
			$ma_khach_hang = $_SESSION['ma_khach_hang'];
			$query         = "select * from khach_hang where ma_khach_hang = '$ma_khach_hang'";
			$result = mysqli_query($connect,$query);
			$error=mysqli_error($connect);
			$row    = mysqli_fetch_array($result);

			$ma_khach_hang=$row['ma_khach_hang'];
			$ten_khach_hang=$row['ten_khach_hang'];
			$sdt=$row['sdt'];
			$email=$row['email'];
			$mat_khau=$row['mat_khau'];
			$ngay_sinh=$row['ngay_sinh'];
			$dia_chi=$row['dia_chi'];
			$gioi_tinh=$row['gioi_tinh'];
			}
			else{
				header("location:form_sign_in_admin.php");
			}
		}
							
	?>
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
			<td>Ngày sinh:</td>
			<td><input type='text' value="<?php echo $ngay_sinh ?>"></td>
		</tr>
		<tr>
			<td>Địa chỉ:</td>
			<td><textarea name="dia_chi"><?php echo $dia_chi ?></textarea></td>
		</tr>
		<tr>
			<td>Giới tính:</td>
			<?php 
				if($gioi_tinh==0){
				echo "<td><input type='radio' name='gioi_tinh' checked value='0'>Nữ<input type='radio' name='gioi_tinh' value='1'>Nam</td></tr>";
			}
			else{
				echo "<td><input type='radio' name='gioi_tinh' value='0'>Nữ<input type='radio' name='gioi_tinh' checked value='1'>Nam</td></tr>";
			}
			?>
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
<?php
						if (isset($_GET['success_update_khach_hang'])) {
								
								echo "<script language='javascript'>
								alert('Đã sửa thông tin của bạn');
								</script>;";
							}
							elseif (isset($_GET['error_update_khach_hang'])) {
								echo "<script language='javascript'>
								alert('Lỗi sửa thông tin');
								</script>;";
							}
							elseif (isset($_GET['dien_thieu'])) {
								echo "<script language='javascript'>
								alert('Điền đầy đủ thông tin khi sửa');
								</script>;";
							}
							else if (isset($_GET['sai_mat_khau'])) {
								echo '<script language="javascript">';
								echo 'alert("Bạn nhập không đúng mật khẩu")';
								echo '</script>';
							}
							else if (isset($_GET['khong_trung_mat_khau'])) {
								echo '<script language="javascript">';
								echo 'alert("Hai mật khẩu phải trùng nhau")';
								echo '</script>';
							}
							else if (isset($_GET['doi_thanh_cong'])) {
								echo '<script language="javascript">';
								echo 'alert("Mật khẩu của bạn đã được thay đổi")';
								echo '</script>';
							}
							
			}
							 ?>
							
</div>


</body>
</html>