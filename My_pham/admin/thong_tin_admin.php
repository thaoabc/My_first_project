
<!DOCTYPE html>
<html>
<head>
	<title>Thông tin khách hàng</title>
	<meta charset="utf-8">
	<style type="text/css">
		table{
			margin: auto;
		}
	</style>
</head>
<body>
	<?php
	if (isset($_SESSION['ma_admin'])) {
		
		require('connect_database.php');
		$ma_admin = $_SESSION['ma_admin'];
		$query         = "select * from admin where ma_admin = '$ma_admin'";
		$result = mysqli_query($connect,$query);
		$error=mysqli_error($connect);
		$row    = mysqli_fetch_array($result);

	}
	else{
		header("location:form_sign_in_admin.php");
	}
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
								<form action="" method="post">
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
								</form>
							</div>
						</div>
					</div>
				</div>
			
			
		</div>
	</div>


</body>
</html>