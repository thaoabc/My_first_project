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
				$_SESSION['ten_khach_hang'] = $row['ten_khach_hang'];
				$_SESSION['email']          = $row['email'];
				$_SESSION['sdt']          = $row['sdt'];
				$_SESSION['ngay_sinh']          = $row['ngay_sinh'];
				$_SESSION['gioi_tinh']          = $row['gioi_tinh'];

				$ma_khach_hang=$_SESSION['ma_khach_hang'];
				$ten_khach_hang=$_SESSION['ten_khach_hang'];
				$sdt=$_SESSION['sdt'];
				$email=$_SESSION['email'];
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
			$ngay_sinh=$row['ngay_sinh'];
			$dia_chi=$row['dia_chi'];
			$gioi_tinh=$row['gioi_tinh'];
			}
			else{
				header("location:form_sign_in_admin.php");
			}
		}
		
	?>
		<form action="process_update_khach_hang.php" method="post">
			<input type="hidden" readonly name="ma_khach_hang" value="<?php echo $ma_khach_hang ?>"><br>
			<table>
			<tr>
				<td>Họ và tên:</td>
				<td><input type='text'name="ten_khach_hang" value="<?php echo $ten_khach_hang ?>"></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type='email'name="email" style='background:#f1f1f1;' value="<?php echo $email ?>"></td>
			</tr>
			<tr>
				<td>Số điện thoại:</td>
				<td><input type='text'name="sdt" style='background:#f1f1f1;' value="<?php echo $sdt ?>"></td>
			</tr>
			<tr>
				<td>Ngày sinh:</td>
				<td><input type='date'name="ngay_sinh" value="<?php echo $ngay_sinh ?>"></td>
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
			<tr>
				<td>
					<button name="thay_thong_tin" value="1">Thay đổi</button>
				</td>
			</tr>
		</table>
	</form>

</body>
</html>