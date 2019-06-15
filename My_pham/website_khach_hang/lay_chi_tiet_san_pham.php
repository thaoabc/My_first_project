<!DOCTYPE html>
<html>
<head>
	<title>Cho vào giỏ hàng</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		session_start();
		
		if (isset($_GET['ma_san_pham'])) {
			$ma_san_pham=$_GET['ma_san_pham'];
			

			include('connect_database.php');
			$query="select*from san_pham join nha_san_xuat on san_pham.ma_nha_san_xuat=nha_san_xuat.ma_nha_san_xuat
				join danh_muc on san_pham.ma_danh_muc=danh_muc.ma_danh_muc
				where ma_san_pham='$ma_san_pham'";
			$error=mysqli_error($connect);
			print_r($error);
			$result=mysqli_query($connect,$query);
			$row=mysqli_fetch_array($result);
			$_SESSION['ma_san_pham']=$row['ma_san_pham'];
			$_SESSION['anh']=$row['anh'];
			$_SESSION['ten_san_pham']=$row['ten_san_pham'];
			$_SESSION['gia']=$row['gia'];
			$_SESSION['ten_nha_san_xuat']=$row['ten_nha_san_xuat'];
			$_SESSION['mo_ta']=$row['mo_ta'];
			$_SESSION['ten_danh_muc']=$row['ten_danh_muc'];
			mysqli_close($connect);

			header("location:single.php");
		}
		else{
			echo "<script>window.history.back()</script>";
		}
	?>

</body>
</html>