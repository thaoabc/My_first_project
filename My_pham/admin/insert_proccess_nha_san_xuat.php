<?php
	require 'kiem_tra_admin.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Xử lý thêm nhà sản xuất</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
	if(!empty($_POST['submit'])&&!empty($_POST['ten_nha_san_xuat'])){
		require('connect_database.php');
		$ten_nha_san_xuat=$_POST['ten_nha_san_xuat'];

		$query="insert into nha_san_xuat(ten_nha_san_xuat) values('$ten_nha_san_xuat')";

		$result=mysqli_query($connect,$query);
		$error = mysqli_error($connect);
		mysqli_close($connect);
	    if(empty($error)){
	        header("location:view_nha_san_xuat.php?success_insert");
	    }
		else{
			header("location:view_nha_san_xuat.php?error_insert");
		}
		
	}
	else{
		header("location:view_nha_san_xuat.php?dien_thieu");
	}

	?>

</body>
</html>