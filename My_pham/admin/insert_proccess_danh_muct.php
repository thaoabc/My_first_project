<?php
	require 'kiem_tra_admin.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Xử lý thêm danh mục</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
	if(!empty($_POST['submit'])&&!empty($_POST['ten_danh_muc'])){
		require('connect_database.php');
		$ten_danh_muc=$_POST['ten_danh_muc'];

		$query="insert into danh_muc(ten_danh_muc) values('$ten_danh_muc')";
		$result=mysqli_query($connect,$query);
		$error = mysqli_error($connect);
	    if(empty($error)){
	        header("location:view_danh_muc.php?success_insert");
	    }
		else{
			header("location:view_danh_muc.php?error_insert");
		}
		mysqli_close($connect);
	}
	else{
		header("location:view_danh_muc.php?dien_thieu");
	}
	?>

</body>
</html>