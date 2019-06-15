<?php
	require 'kiem_tra_admin.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Xử lý sửa thành viên nhà sản xuất</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
	if(!empty($_POST['submit'])&&!empty($_POST['ten_nha_san_xuat'])){
		include('connect_database.php');
		$ma_nha_san_xuat=$_POST['ma_nha_san_xuat'];
		$ten_nha_san_xuat=$_POST['ten_nha_san_xuat'];
		
		$query="update nha_san_xuat set ten_nha_san_xuat='$ten_nha_san_xuat' where ma_nha_san_xuat='$ma_nha_san_xuat'";

		$result=mysqli_query($connect,$query);
		mysqli_close($connect);
		$error = mysqli_error($connect);
	    if(empty($error)){
	        header("location:view_nha_san_xuat.php?success_update");
	    }
		
		else{
			header("location:view_nha_san_xuat.php?error_update");
		}
	}
	else{
		header("location:view_nha_san_xuat.php?dien_thieu");
	}
	?>

</body>
</html>