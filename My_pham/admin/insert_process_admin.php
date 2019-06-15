<!DOCTYPE html>
<html>
<head>
	<title>Xử lý thêm admin</title>
	<meta charset="utf-8">
</head>
<body>
	<?php

		require('connect_database.php');
		$ten_admin=$_POST['ten_admin'];
		$sdt=$_POST['sdt'];
		$email=$_POST['email'];
		$mat_khau=$_POST['mat_khau'];
		$dia_chi=$_POST['dia_chi'];
		$gioi_tinh=$_POST['gioi_tinh'];
		$cap_do=$_POST['cap_do'];

		$query="select*from admin where email='$email' and
			 sdt='$sdt'";
		$result=mysqli_query($connect,$query);
		$count=mysqli_num_rows($result);

		if ($count==1) {
			header('location:view_admin.php?error_duplicate_entry');
		}
		elseif ($count==0) {

			$query="insert into admin(ten_admin,sdt,email,mat_khau,dia_chi,gioi_tinh,cap_do) values('$ten_admin','$sdt','$email','$mat_khau','$dia_chi','$gioi_tinh','$cap_do')";

			$result=mysqli_query($connect,$query);
			$error = mysqli_error($connect);
			var_dump($error);
		    if(empty($error)){
		        header("location:view_admin.php?success_insert");
		    }
			else{
				header("location:view_admin.php?error_insert");
			}
			mysqli_close($connect);
		}

	?>

</body>
</html>