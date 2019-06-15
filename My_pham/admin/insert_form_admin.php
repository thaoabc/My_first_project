<!DOCTYPE html>
<html>
<head>
	<title>Thêm admin</title>
	<meta charset="utf-8">
	<style>
		table{
				margin: auto;
			}
	</style>
</head>
<body>

	<form action="insert_process_admin.php" method="post">
		<table>
			<tr><td>Tên admin:</td><td>
				<input type="text" name="ten_admin">
			</td></tr>
			<tr><td>Số điện thoại:</td><td>
				<input type="number" name="sdt">
			</td></tr>
			<tr><td>Email:</td><td>
				<input type="email" name="email">
			</td></tr>
			<tr><td>Mật khẩu:</td><td>
				<input type="password" name="mat_khau">
			</td></tr>
			<tr><td>Địa chỉ:</td><td>
				<textarea name="dia_chi"></textarea>
			</td></tr>
			<tr><td>Giới tính:</td><td>
				<input type="radio" name="gioi_tinh" value="1">Nam
					  <input type="radio" name="gioi_tinh" value="0">Nữ
					</td></tr>
			<tr><td>Cấp độ:</td><td>
				<select name="cap_do">
					<option value="1">1</option>
					<option value="2">2</option>
				</select>
			</td></tr>
			<tr><td colspan="2" style="text-align: center;">
				<button style="margin-top: 20px;" name="submit">Thêm admin</button>
			</td></tr>
		</table>
	</form>

</body>
</html>