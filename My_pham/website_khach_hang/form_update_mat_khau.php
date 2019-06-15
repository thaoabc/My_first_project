<!DOCTYPE html>
<html>
<head>
	<title>xem thông tin khách hàng</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
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
				$_SESSION['mat_khau'] = $row['mat_khau'];

				$ma_khach_hang=$_SESSION['ma_khach_hang'];
				$mat_khau=$_SESSION['mat_khau'];
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
			$mat_khau=$row['mat_khau'];

			}
			else{
				header("location:form_sign_in.php");
			}
		}
		
	?>
		<form action="process_update_mat_khau.php" method="post">
			<input type="hidden" readonly name="mat_khau" value="<?php echo $mat_khau ?>"><br>
			<input type="hidden" readonly name="ma_khach_hang" value="<?php echo $ma_khach_hang ?>"><br>
			<table>
					<tr>
						<td>Nhập mật khẩu của bạn:</td>
						<td><input type='text'name="mat_khau_cu" placeholder="Nhập mật khẩu cũ" required></td>
					</tr>
					<tr>
						<td>Nhập mật khẩu mới:</td>
						<td>
							
							<input type="password" name="mat_khau_moi" id="mat_khau" placeholder="Nhập mật khẩu mới"  />
						</td>
					</tr>
					
					<tr>
						<td>Nhập lại mật khẩu:</td>
						<td>
							
							<input type="password" id="retype_password" name="re_mat_khau_moi" placeholder="Nhập lại mật khẩu" />
						</td>
					</tr>
					
					<tr>
						<td>
							<input type="submit" name="doi_mat_khau" method="post" onclick="return doi_mat_khau()" value="Xác Nhận Đổi">
						</td>
					</tr>
			
		</table>
	</form>

</body>
</html>