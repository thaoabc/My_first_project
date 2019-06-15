<!DOCTYPE html>
<html>
<head>
	<title>Xử lý sửa thông tin khách hàng</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		require('connect_database.php');
		if (!empty($_POST['thay_thong_tin'])&&!empty($_POST['ten_khach_hang'])&&!empty($_POST['email'])&&!empty($_POST['sdt'])&&!empty($_POST['ngay_sinh'])&&!empty($_POST['dia_chi'])&&isset($_POST['gioi_tinh'])) {
			$ma_khach_hang=$_POST['ma_khach_hang'];
			$ten_khach_hang=$_POST['ten_khach_hang'];
			$email=$_POST['email'];
			$sdt=$_POST['sdt'];
			$ngay_sinh=$_POST['ngay_sinh'];
			$dia_chi=$_POST['dia_chi'];
			$gioi_tinh=$_POST['gioi_tinh'];
			$query="update khach_hang  set ten_khach_hang='$ten_khach_hang',email='$email',sdt='$sdt',ngay_sinh='$ngay_sinh',dia_chi='$dia_chi',gioi_tinh='$gioi_tinh' where ma_khach_hang=$ma_khach_hang";
			$result=mysqli_query($connect,$query);
			$error = mysqli_error($connect);
			mysqli_close($connect);
		    if(empty($error)){
		        header("location:thong_tin_khach_hang.php?success_update_khach_hang");
		    }
			else{
				header("location:thong_tin_khach_hang.php?error_update_khach_hang");
			}
			
		}
		else{
			header("location:thong_tin_khach_hang.php?dien_thieu");
		}
		

	?>


</body>
</html>