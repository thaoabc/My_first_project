<!DOCTYPE html>
<html>
<head>
	<title>Xử lý đăng ký</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		if(!isset($_POST['myform'])){
			header("location:sign_up_admin.php?error");
		}
		else{
			$email=$_POST['email'];
			$sdt=$_POST['sdt'];

			require('connect_database.php');
			$query="select*from admin where email='$email' and
			 sdt='$sdt'";
			$result=mysqli_query($connect,$query);
			mysqli_close($connect);
			$count=mysqli_num_rows($result);

			if ($count==1) {
				header('location:sign_up_admin.php?error_isset');
			}
			elseif ($count==0) {

				$ten_admin=$_POST['ten_admin'];
				$email=$_POST['email'];
				$mat_khau=$_POST['mat_khau'];
				$sdt=$_POST['sdt'];
				$cap_do=$_POST['cap_do'];
				$gioi_tinh=$_POST['gioi_tinh'];
				$dia_chi=$_POST['dia_chi'];

				require('connect_database.php');
				// $query="insert into admin(ten_admin,email,mat_khau,cap_do) values('$ten_dang_ky','$email','$mat_khau','$cap_do')";
				$query="insert into admin(ten_admin,email,mat_khau,sdt,dia_chi,gioi_tinh,cap_do) values('$ten_admin','$email','$mat_khau','$sdt','$dia_chi','$gioi_tinh','$cap_do')";
				mysqli_query($connect,$query);

				$error=mysqli_error($connect);
				print_r($error);
				if(!empty($error)){
					header("location:sign_up_admin.php?error");
				}
				else{
					$query='select max(ma_admin) from admin';
					$result_new=mysqli_query($connect,$query);
					$row=mysqli_fetch_array($result_new);					
					$ma=$row['max(ma_admin)'];

					$query="select*from admin where ma_admin='$ma'";
					$result=mysqli_query($connect,$query);
					mysqli_close($connect);
					$row=mysqli_fetch_array($result);
		
					session_start();
					$_SESSION['ma_admin'] 	=$ma;
					$_SESSION['ten_admin'] = $row['ten_admin'];
					$_SESSION['email']          = $row['email'];
					$_SESSION['mat_khau']       = $row['mat_khau'];
					$_SESSION['sdt']          	= $row['sdt'];
					$_SESSION['dia_chi']        = $row['dia_chi'];
					$_SESSION['gioi_tinh']      = $row['gioi_tinh'];
					$_SESSION['cap_do']         = $row['cap_do'];
					header("location:view_admin.php?success_insert");
				}
			}
		}
	?>

</body>
</html>