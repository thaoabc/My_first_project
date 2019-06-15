<!DOCTYPE html>
<html>
<head>
	<title>Sửa thông tin danh mục</title>
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
		$ma_danh_muc=$_GET['ma_danh_muc'];
		$query="select*from danh_muc where ma_danh_muc='$ma_danh_muc' limit 1";
		$result=mysqli_query($connect,$query);
		$row=mysqli_fetch_array($result);
		mysqli_close($connect);
	?>
	<form action="update_process_danh_muc.php" method="post">
		<input type="hidden" name="ma_danh_muc" value="<?php echo $row['ma_danh_muc'] ?>"><br>
		Tên danh mục:<input type="text" name="ten_danh_muc" value="<?php echo $row['ten_danh_muc'] ?>"><br>
		<button name="submit" value="1">Sửa tên danh mục</button>
	</form>
</body>