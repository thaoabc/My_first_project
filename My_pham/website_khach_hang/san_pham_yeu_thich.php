<!DOCTYPE html>
<html>
<head>
	<title>Cho vào sản phẩm yêu thích</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		$ma_san_pham=$_GET['ma_san_pham'];
		session_start();
		if (isset($_SESSION['ma_khach_hang'])) {
			$ma_khach_hang=$_SESSION['ma_khach_hang'];

			include('connect_database.php');
			$query_all="select*from yeu_thich";
			$error=mysqli_error($connect);
			print_r($error);
			$result_all=mysqli_query($connect,$query_all);

			while ($row_all=mysqli_fetch_array($result_all)) {
				if ($row_all['ma_san_pham']==$ma_san_pham) {
					$query_each="select*from yeu_thich where ma_khach_hang=$ma_khach_hang";
					$result_each=mysqli_query($connect,$query_each);
					while($row_each=mysqli_fetch_array($result_each)){
							$query_insert="insert into yeu_thich (ma_khach_hang,ma_san_pham) values($ma_khach_hang,$ma_san_pham)";
							mysqli_query($connect,$query_insert);
							$query_update="update yeu_thich_nhat set so_lan_yeu_thich=(select count(*) from yeu_thich where ma_san_pham=$ma_san_pham) where ma_san_pham=$ma_san_pham";
							mysqli_query($connect,$query_update);
					}
						
				}
				else{
					$query="insert into yeu_thich (ma_khach_hang,ma_san_pham) values($ma_khach_hang,$ma_san_pham)";
					mysqli_query($connect,$query);
					$query_insert="insert into yeu_thich_nhat (ma_san_pham,so_lan_yeu_thich) values($ma_san_pham,1)";
					mysqli_query($connect,$query_insert);
					
				}
			}
			mysqli_close($connect);
			header("location:categories.php");
		}
		else{

			header("location:categories.php");
		}
	?>

</body>
</html>