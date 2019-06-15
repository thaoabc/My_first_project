<!DOCTYPE html>
<html>
<head>
	<title>Cho vào giỏ hàng</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		$ma_san_pham=$_GET['ma_san_pham'];
		session_start();
		if (isset($_SESSION['ma_khach_hang'])) {
			require('connect_database.php');

			$query="select so_luong_ton_kho from san_pham where ma_san_pham='$ma_san_pham'";
			$result=mysqli_query($connect,$query);
			$row=mysqli_fetch_array($result);
			
			mysqli_close($connect);
			if ($row['so_luong_ton_kho']<1) {
				echo "<script>window.history.back()</script>";
			}

			if(isset($_SESSION['gio_hang'][$ma_san_pham])){
				$_SESSION['gio_hang'][$ma_san_pham]['so_luong']++;
			}
			else{
				include('connect_database.php');
				$query="select*from san_pham where ma_san_pham='$ma_san_pham'";
				$error=mysqli_error($connect);
				print_r($error);
				$result=mysqli_query($connect,$query);
				$row=mysqli_fetch_array($result);
				$_SESSION['gio_hang'][$ma_san_pham]['so_luong']=1;
				$_SESSION['gio_hang'][$ma_san_pham]['anh']=$row['anh'];
				$_SESSION['gio_hang'][$ma_san_pham]['ten_san_pham']=$row['ten_san_pham'];
				$_SESSION['gio_hang'][$ma_san_pham]['gia']=$row['gia'];
				mysqli_close($connect);
			}
			echo "<script>window.history.back()</script>";
		}
		else{
			header("location:index.php?chua_dang_ky");
		}
	?>

</body>
</html>