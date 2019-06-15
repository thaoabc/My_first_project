<!DOCTYPE html>
<html>
<head>
	<title>Sửa thông tin thành viên admin</title>
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
		$ma_admin=$_GET['ma_admin'];
		$query="select*from admin where ma_admin='$ma_admin' limit 1";
		$result=mysqli_query($connect,$query);
		$row=mysqli_fetch_array($result);
	?>
	<form action="update_process_admin.php" method="post">
		<input type="hidden" name="ma_admin" value="<?php echo $row['ma_admin'] ?>"><br>
		<table>
			<tr><td>Tên admin:</td><td>
				<input type="text" name="ten_admin" value="<?php echo $row['ten_admin'] ?>"></td></tr>
			<tr><td>Số điện thoại:</td><td>
				<input type="number" name="sdt" value="<?php echo $row['sdt'] ?>"></td></tr>
			<tr><td>Email:</td><td>
				<input type="email" name="email" value="<?php echo $row['email'] ?>"></td></tr>
			<tr><td>Mật khẩu cũ:</td><td>
				<input type="text" readonly value="<?php echo $row['mat_khau'] ?>"></td></tr>
			<tr><td>Mật khẩu mới:</td><td>
				<input type="password" required name="mat_khau"></td></tr>
			<tr><td>Địa chỉ:</td><td>
				<textarea name="dia_chi"><?php echo $row['dia_chi'] ?></textarea></td></tr>
			<tr><td>Giới tính</td><td>
			<?php 
				if($row['gioi_tinh']==0){
					echo "<input type='radio' name='gioi_tinh' checked value='0'>Nữ<input type='radio' name='gioi_tinh' value='1'>Nam</td></tr>";
				}
				else{
					echo "<input type='radio' name='gioi_tinh' value='0'>Nữ<input type='radio' name='gioi_tinh' checked value='1'>Nam</td></tr>";
				}
			?>
			<tr><td>Cấp độ:</td><td>
			<?php 
				if($row['cap_do']==1){
					echo "<select name='cap_do_moi'>
							<option selected value='1'>SuperAdmin</option>
							<option value='2'>Admin</option>
						</select></td></tr>";
				}
				elseif ($row['cap_do']==2) {
					echo "<select name='cap_do_moi'>
							<option value='1'>SuperAdmin</option>
							<option selected value='2'>Admin</option>
						</select></td></tr>";
				}
			?>
			<tr><td colspan="2" style="text-align: center;">
				<button style="margin-top: 20px;" name="submit" value="1">Sửa thành viên admin</button>
			</td></tr>
		</table>
	</form>
</body>