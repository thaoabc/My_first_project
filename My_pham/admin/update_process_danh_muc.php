<?php
	require 'kiem_tra_admin.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Xử lý sửa danh mục</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
	if(!empty($_POST['submit'])&&!empty($_POST['ten_danh_muc'])){
		include('connect_database.php');
		$ma_danh_muc=$_POST['ma_danh_muc'];
		$ten_danh_muc=$_POST['ten_danh_muc'];
		
		$query="update danh_muc set ten_danh_muc='$ten_danh_muc' where ma_danh_muc='$ma_danh_muc'";

		$result=mysqli_query($connect,$query);
		mysqli_close($connect);
		$error = mysqli_error($connect);
	    if(empty($error)){
	        header("location:view_danh_muc.php?success_update");
	    }
		
		else{
			header("location:view_danh_muc.php?error_update");
		}
	}
	else {
		header("location:view_danh_muc.php?dien_thieu");
	}
	?>

</body>
</html>