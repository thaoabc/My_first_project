<?php
	require 'kiem_tra_admin.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Xử lý sửa thông tin khách hàng</title>
	<meta charset="utf-8">
</head>
<body>
	<?php

	if(!empty($_POST['thay_thong_tin'])&&!empty($_POST['ten_admin'])&&!empty($_POST['email'])&&!empty($_POST['sdt'])&&!empty($_POST['dia_chi'])&&isset($_POST['gioi_tinh'])) {
		require('connect_database.php');
		$ma_admin=$_POST['ma_admin'];
		$ten_admin=$_POST['ten_admin'];
		$email=$_POST['email'];
		$sdt=$_POST['sdt'];
		$dia_chi=$_POST['dia_chi'];
		$gioi_tinh=$_POST['gioi_tinh'];
		$query="update admin  set ten_admin='$ten_admin',email='$email',sdt='$sdt',dia_chi='$dia_chi',gioi_tinh='$gioi_tinh' where ma_admin=$ma_admin";
		$result=mysqli_query($connect,$query);
		$error = mysqli_error($connect);
		mysqli_close($connect);
	    if(empty($error)){
	        header("location:admin.php?success_update");
	    }
		else{
			header("location:admin.php?error_update");
		}
	}
	else{
		header("location:admin.php?dien_thieu");
	}

	?>


</body>
</html>