<!DOCTYPE html>
<html>
<head>
	<title>Xóa một nhà sản xuất</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		require('connect_database.php');
		$ma_nha_san_xuat=$_GET['ma_nha_san_xuat'];
		$query="delete from nha_san_xuat where ma_nha_san_xuat='$ma_nha_san_xuat'";
		mysqli_query($connect,$query);
		$error=mysqli_error($connect);
		mysqli_close($connect);
		if (empty($error)) {
			header('location:view_nha_san_xuat.php?success_delete');
		}
		else{
			header('location:view_nha_san_xuat.php?error_delete');
		}
		
		
	?>

</body>
</html>