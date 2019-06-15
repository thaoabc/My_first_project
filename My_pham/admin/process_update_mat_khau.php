<?php
	require 'kiem_tra_admin.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Xử lý sửa mật khẩu</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		require('connect_database.php');
		if(!empty($_POST['xac_nhan_mat_khau']) && !empty($_POST['mat_khau_cu']) && !empty($_POST['mat_khau_moi']) && !empty($_POST['re_mat_khau_moi'])){
			$ma_admin=$_POST['ma_admin'];
			$mat_khau=$_POST['mat_khau'];
			$mat_khau_cu=$_POST['mat_khau_cu'];
			$mat_khau_moi=$_POST['mat_khau_moi'];
			$re_mat_khau_moi=$_POST['re_mat_khau_moi'];

			if ($mat_khau_cu==$mat_khau) {
				if ($mat_khau_moi==$re_mat_khau_moi) {
					$query="update admin  set mat_khau='$mat_khau_moi' where ma_admin=$ma_admin";
					$result=mysqli_query($connect,$query);
					$error = mysqli_error($connect);
					mysqli_close($connect);
					if (empty($error)) {
						header("location:admin.php?success_password");
					}
					else{
						header("location:admin.php?error_password");
					}
					
				}
				else{
					header("location:admin.php?khong_trung_mat_khau");
				}
			}
			else{
				header("location:admin.php?sai_mat_khau");
			}
			
		}
		else{
			header("location:admin.php?dien_thieu");
		}
		

	?>


</body>
</html>