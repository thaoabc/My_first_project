<?php
	require 'kiem_tra_admin.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Xử lý sửa thành viên admin</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
	if(!empty($_POST['submit'])&&!empty($_POST['ten_admin'])&&!empty($_POST['sdt'])&&!empty($_POST['email'])&&!empty($_POST['mat_khau'])&&!empty($_POST['dia_chi'])&&!isset($_POST['gioi_tinh'])&&!empty($_POST['cap_do_moi'])){
		include('connect_database.php');
		$ma_admin=$_POST['ma_admin'];
		$ten_admin=$_POST['ten_admin'];
		$sdt=$_POST['sdt'];
		$email=$_POST['email'];
		$mat_khau=$_POST['mat_khau'];
		$dia_chi=$_POST['dia_chi'];
		$gioi_tinh=$_POST['gioi_tinh'];
		$cap_do=$_POST['cap_do_moi'];

		$query="update admin set ten_admin='$ten_admin',sdt='$sdt',email='$email',mat_khau='$mat_khau',dia_chi='$dia_chi',gioi_tinh='$gioi_tinh',cap_do='$cap_do' where ma_admin='$ma_admin'";

		$result=mysqli_query($connect,$query);
		mysqli_close($connect);
		$error = mysqli_error($connect);
	    if(empty($error)){
	        header("location:view_admin.php?success_update");
	    }
		
		else{
			header("location:view_admin.php?error_update");
		}
	}
	else{
		header("location:view_admin.php?dien_thieu");
	}
	?>

</body>
</html>