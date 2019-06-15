<?php
	require 'kiem_tra_admin.php';
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
		$kieu       = $_GET['kieu'];
		if($kieu=="duyet"){
			$tinh_trang = 2;
		}
		else{
			$tinh_trang = 3;
		}

		$query="select* from hoa_don_chi_tiet 
				join san_pham on hoa_don_chi_tiet.ma_san_pham=san_pham.ma_san_pham
				where ma_hoa_don='$ma_hoa_don'";
		$result=mysqli_query($connect,$query);
		$array_hoa_don = array();
		while ($row=mysqli_fetch_array($result)) {

			$ma_san_pham=$row['ma_san_pham'];
			$array_hoa_don[$ma_san_pham]['so_luong']=$row['so_luong'];
			$array_hoa_don[$ma_san_pham]['so_luong_ton_kho']=$row['so_luong_ton_kho'];
		}

		foreach ($array_hoa_don as $ma_san_pham => $each_san_pham) { 

			$so_luong = $each_san_pham['so_luong'];
			$query="select so_luong_ton_kho from san_pham where ma_san_pham='$ma_san_pham'";
			$result=mysqli_query($connect,$query);
			$row=mysqli_fetch_array($result);

			if ($so_luong>($row['so_luong_ton_kho'])) {

				header("location:view_hoa_don.php?ma_san_pham=$ma_san_pham");
			}
							
		}
		$query = "update hoa_don set tinh_trang = '$tinh_trang'
					where ma_hoa_don = '$ma_hoa_don' and tinh_trang = 1";
		$result=mysqli_query($connect,$query);
		$query_update="update san_pham set so_luong_ton_kho= {$each_san_pham[ 'so_luong_ton_kho' ]} - {$each_san_pham[ 'so_luong' ]} where ma_san_pham=$ma_san_pham";
		$result_update=mysqli_query($connect,$query_update);
		mysqli_close($connect);			
		header("location:view_hoa_don.php");
	?>

</body>
</html>