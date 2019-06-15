<?php
	require 'kiem_tra_admin.php';
?>
 <!DOCTYPE html>
<html>
<head>
	<title>Xử lý khi sửa sản phẩm</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
	if (!empty($_POST['sua_san_pham'])&&!empty($_POST['ten_san_pham'])&&!empty($_POST['gia'])&&!empty($_POST['mo_ta'])&&!empty($_POST['so_luong_da_nhap'])&&!empty($_POST['so_luong_ton_kho'])&&!empty($_POST['nha_san_xuat'])&&!empty($_POST['danh_muc'])) {
		require('connect_database.php');
		$ma_san_pham=$_POST['ma_san_pham'];
		$ten_san_pham=$_POST['ten_san_pham'];
		$so_luong_da_nhap=$_POST['so_luong_da_nhap'];
		$so_luong_ton_kho=$_POST['so_luong_ton_kho'];
		$gia=$_POST['gia'];
		$mo_ta=$_POST['mo_ta'];
		$ma_nha_san_xuat=$_POST['nha_san_xuat'];
		$ma_danh_muc=$_POST['danh_muc'];
		$file=$_FILES['anh_moi'];
		if(file_exists($file['tmp_name'])){
			$imageFileType = strtolower(pathinfo($file["name"],PATHINFO_EXTENSION));
			$file_name     = time(). ".$imageFileType";
			$target_dir    = "../images/";
			$target_file   = $target_dir . $file_name;

			$uploadOk = 1;
			if(isset($_POST["submit"])) {
			    $check = getimagesize($file["tmp_name"]);
			    if($check !== false) {
			        $uploadOk = 1;
			    } else {
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    $uploadOk = 0;
			}
			// Check file size
			if ($file["size"] > 500000) {
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 1) {
			    if (move_uploaded_file($file["tmp_name"], $target_file)) {
			    	$uploadOk = 1;
			    } else {
			        $uploadOk = 0;
			    }
			}

			if($uploadOk!=0){
				require('connect_database.php');
				$anh          = $target_file;
				$query="update san_pham set ten_san_pham='$ten_san_pham',so_luong_da_nhap='$so_luong_da_nhap',so_luong_ton_kho='$so_luong_ton_kho',gia='$gia',mo_ta='$mo_ta',gia='$gia',anh='$anh',ma_nha_san_xuat='$ma_nha_san_xuat',ma_danh_muc='$ma_danh_muc' where ma_san_pham='$ma_san_pham'" ;
				mysqli_query($connect,$query);
				$error=mysqli_error($connect);
				print_r($error);
				mysqli_close($connect);

				if(empty($error)){
					if(isset($file)){
						$anh_cu = $_POST['anh_cu'];
						$target_file = $target_dir . $anh_cu;
						unlink($target_file);
					}
				    header("location:view_san_pham.php?success_update");
				 }
				 else{
				header("location:view_san_pham.php?error_update_anh_moi");
				}
			}
			else{

				header("location:view_san_pham.php?error_update_anh_moi");
			}
		}
		else{
			$query="update san_pham set ten_san_pham='$ten_san_pham',so_luong_da_nhap='$so_luong_da_nhap',so_luong_ton_kho='$so_luong_ton_kho',gia='$gia',mo_ta='$mo_ta',ma_nha_san_xuat='$ma_nha_san_xuat',ma_danh_muc='$ma_danh_muc' where ma_san_pham='$ma_san_pham'" ;
			mysqli_query($connect,$query);
			$error=mysqli_error($connect);
			print_r($error);
			mysqli_close($connect);
			if(empty($error)){
			    header("location:view_san_pham.php?san_pham");
			}
			else{
				header("location:view_san_pham.php?error_update");
			}
		}

	}
	else{
		header("location:admin.php?san_pham");
	}
	?>

</body>
</html>