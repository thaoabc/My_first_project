<?php
	require 'kiem_tra_admin.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Xóa sản phẩm</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		require('connect_database.php');
		$ma_san_pham=$_GET['ma_san_pham'];
		$query="delete from san_pham where ma_san_pham='$ma_san_pham'";
		mysqli_query($connect,$query);
		$error=mysqli_error($connect);
		if (empty($error)) {
			header("location:view_san_pham.php?success_delete");
		}
		else{
			header("location:view_san_pham.php?error_delete");
		}
		mysqli_close($connect);
	?>

</body>
</html>