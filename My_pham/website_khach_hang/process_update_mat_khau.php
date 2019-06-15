<!DOCTYPE html>
<html>
<head>
	<title>Xử lý sửa thông tin khách hàng</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		require('connect_database.php');
		if(!empty($_POST['doi_mat_khau']) && !empty($_POST['mat_khau_cu']) && !empty($_POST['mat_khau_moi']) && !empty($_POST['re_mat_khau_moi'])){
			$ma_khach_hang=$_POST['ma_khach_hang'];
			$mat_khau=$_POST['mat_khau'];
			$mat_khau_cu=$_POST['mat_khau_cu'];
			$mat_khau_moi=$_POST['mat_khau_moi'];
			$re_mat_khau_moi=$_POST['re_mat_khau_moi'];

			if ($mat_khau_cu==$mat_khau) {
				if ($mat_khau_moi==$re_mat_khau_moi) {
					$query="update khach_hang  set mat_khau='$mat_khau_moi' where ma_khach_hang=$ma_khach_hang";
					$result=mysqli_query($connect,$query);
					$error = mysqli_error($connect);
					mysqli_close($connect);
					if(empty($error)){
			        header("location:thong_tin_khach_hang.php?doi_thanh_cong");
				    }
					else{
						header("location:thong_tin_khach_hang.php?doi_that_bai");
					}
				}
				else{
					header("location:thong_tin_khach_hang.php?khong_trung_mat_khau");
				}
			}
			else{
				header("location:thong_tin_khach_hang.php?sai_mat_khau");
			}
			
		}
		else{
			header("location:thong_tin_khach_hang.php?dien_thieu");
		}
		

	?>

</body>
</html>