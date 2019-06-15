<!DOCTYPE html>
<html>
<head>
	<title>Xử lý đăng ký</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		if(!isset($_POST['myform'])){
			header("location:sign_up.php?error");
		}
		else{
			$email=$_POST['email'];
			$sdt=$_POST['sdt'];

			require('connect_database.php');
			$query="select*from khach_hang where email='$email' and
			 sdt='$sdt'";
			$result=mysqli_query($connect,$query);
			mysqli_close($connect);
			$count=mysqli_num_rows($result);

			if ($count==1) {
				header('location:sign_up.php?error_isset');
			}
			elseif ($count==0) {

				$ten_dang_ky=$_POST['ten_dang_ky'];
				$email=$_POST['email'];
				$mat_khau=$_POST['mat_khau'];
				$sdt=$_POST['sdt'];
				$gioi_tinh=$_POST['gioi_tinh'];
				$dia_chi=$_POST['dia_chi'];
				$ngay_sinh=$_POST['Year'].$_POST['Month'].$_POST['Day'];

				require('connect_database.php');
				// $query="insert into khach_hang(ten_khach_hang,email,mat_khau,cap_do) values('$ten_dang_ky','$email','$mat_khau','$cap_do')";
				$query="insert into khach_hang(ten_khach_hang,email,mat_khau,sdt,dia_chi,ngay_sinh,gioi_tinh) values('$ten_dang_ky','$email','$mat_khau','$sdt','$dia_chi','$ngay_sinh','$gioi_tinh')";
				mysqli_query($connect,$query);

				$error=mysqli_error($connect);
				print_r($error);
				if(!empty($error)){
					header("location:sign_up.php?error");
				}
				else{
					$query='select max(ma_khach_hang) from khach_hang';
					$result_new=mysqli_query($connect,$query);
					$row=mysqli_fetch_array($result_new);					
					$ma=$row['max(ma_khach_hang)'];

					$query="select*from khach_hang where ma_khach_hang='$ma'";
					$result=mysqli_query($connect,$query);
					mysqli_close($connect);
					$row=mysqli_fetch_array($result);
					if(isset($_GET['cookie'])){
						setcookie('ma',$ma,time()+86400*60);
					}
					session_start();
					$_SESSION['ma_khach_hang'] 	=$ma;
					$_SESSION['ten_khach_hang'] = $row['ten_khach_hang'];
					$_SESSION['email']          = $row['email'];
					$_SESSION['mat_khau']       = $row['mat_khau'];
					$_SESSION['sdt']          	= $row['sdt'];
					$_SESSION['dia_chi']        = $row['dia_chi'];
					$_SESSION['ngay_sinh']      = $row['ngay_sinh'];
					$_SESSION['gioi_tinh']      = $row['gioi_tinh'];
					
					header("location:website_khach_hang.php");
				}
			}
		}
	?>

</body>
</html>