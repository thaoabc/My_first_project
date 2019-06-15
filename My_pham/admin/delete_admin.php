<?php
	require 'kiem_tra_admin.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Xóa một thành viên admin</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		require('connect_database.php');
		$ma_admin=$_GET['ma_admin'];
		$query="delete from admin where ma_admin='$ma_admin'";
		mysqli_query($connect,$query);
		$error=mysqli_error($connect);
		mysqli_close($connect);
		if (empty($error)) {
			header('location:view_admin.php?delete_success');
		}
		else{
			header('location:view_admin.php?error_success');
		}
		
		
	?>

</body>
</html>