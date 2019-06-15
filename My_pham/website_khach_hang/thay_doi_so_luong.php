<?php
	session_start();
?><!DOCTYPE html>
<html>
<head>
	<title>Thay đổi số lượng</title>
	<meta charset="utf-8">
</head>
<body>
	<?php

		if (isset($_GET['tang'])) {
			$ma_san_pham = $_GET['tang'];

			require('connect_database.php');

				$query="select so_luong_ton_kho from san_pham where ma_san_pham='$ma_san_pham'";
				$result=mysqli_query($connect,$query);
				$row=mysqli_fetch_array($result);
				
				mysqli_close($connect);
				if ($_SESSION['gio_hang'][$ma_san_pham]['so_luong']>=($row['so_luong_ton_kho'])) {

					header("location:gio_hang.php?qua_so_luong={$row['so_luong_ton_kho']}");
				}
				elseif ($_SESSION['gio_hang'][$ma_san_pham]['so_luong']>9) {
					header("location:gio_hang.php?max");
				}
				else{
					$_SESSION['gio_hang'][$ma_san_pham]['so_luong']++;
					header("location:gio_hang.php");
				}
			
		}
		elseif (isset($_GET['giam'])) {
			$ma_san_pham = $_GET['giam'];
			if ($_SESSION['gio_hang'][$ma_san_pham]['so_luong']>1) {
				$_SESSION['gio_hang'][$ma_san_pham]['so_luong']--;
				header("location:gio_hang.php");
			}
			else{
				
				unset($_SESSION['gio_hang'][$ma_san_pham]);
				header("location:gio_hang.php");
			}
		}

	?>

</body>
</html>