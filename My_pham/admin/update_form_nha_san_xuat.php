<!DOCTYPE html>
<html>
<head>
	<title>Sửa thông tin thành viên nha_san_xuat</title>
	<meta charset="utf-8">
	<style>
		form{
				text-align: center;
			}
	</style>
</head>
<body>

	<?php
		include('connect_database.php');
		$ma_nha_san_xuat=$_GET['ma_nha_san_xuat_update'];
		$query="select*from nha_san_xuat where ma_nha_san_xuat='$ma_nha_san_xuat' limit 1";
		$result=mysqli_query($connect,$query);
		$row=mysqli_fetch_array($result);
	?>
	<form action="update_process_nha_san_xuat.php" method="post">
		<input type="hidden" name="ma_nha_san_xuat" value="<?php echo $row['ma_nha_san_xuat'] ?>"><br>
		Tên nhà sản xuất:<input type="text" name="ten_nha_san_xuat" value="<?php echo $row['ten_nha_san_xuat'] ?>"><br>
		<button name="submit" value="1">Sửa tên nhà sản xuất</button>
	</form>
</body>