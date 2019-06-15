<?php
	 session_start();
	if(empty($_SESSION['ma_khach_hang'])){
		header("location:website_ban_hang.php");
	}
	if (!isset($_GET['huy_don_hang'])) {
		header("location:don_hang.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Thay đổi tình trạng</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		require('connect_database.php');
		$ma_hoa_don = $_GET['ma_hoa_don'];
		$query = "update hoa_don set tinh_trang = 3
		where ma_hoa_don = '$ma_hoa_don' and tinh_trang = 1";
		mysqli_query($connect,$query);
		mysqli_close($connect);
		header("location:don_hang.php?da_huy");
		
	?>

</body>
</html>