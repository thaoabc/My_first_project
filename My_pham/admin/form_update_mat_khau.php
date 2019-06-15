<!DOCTYPE html>
<html>
<head>
	<title>xem thông tin khách hàng</title>
	<meta charset="utf-8">
	<style type="text/css">
		table{
			margin: auto;
		}
	</style>
</head>
<body>
	<?php
		
			require('connect_database.php');
			$ma_admin = $_SESSION['ma_admin'];
			$query         = "select * from admin where ma_admin = '$ma_admin'";
			$result = mysqli_query($connect,$query);
			$error=mysqli_error($connect);
			$row    = mysqli_fetch_array($result);

			$ma_admin=$row['ma_admin'];
			$mat_khau=$row['mat_khau'];

	?>
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
								<form action="process_update_mat_khau.php" method="post">
									<input type="hidden" name="mat_khau" value="<?php echo $mat_khau ?>"><br>
									<input type="hidden" name="ma_admin" value="<?php echo $ma_admin ?>"><br>
									<table>
										<tr>
											<td>Nhập mật khẩu của bạn:</td>
											<td><input type='text'name="mat_khau_cu" ></td>
										</tr>
										<tr>
											<td>Nhập mật khẩu mới:</td>
											<td><input type='text'name="mat_khau_moi" ></td>
										</tr>
										<tr>
											<td>Nhập lại mật khẩu:</td>
											<td><input type='text'name="re_mat_khau_moi" ></td>
										</tr>
										
										<tr>
											<td>
												<button name="xac_nhan_mat_khau" value="1">Xác nhận</button>
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

</body>
</html>