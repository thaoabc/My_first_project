<?php
	require 'kiem_tra_admin.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm sản phẩm</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
	if(!empty($_POST['submit'])&&!empty($_POST['ten_san_pham'])&&!empty($_POST['gia'])&&!empty($_POST['mo_ta'])&&!empty($_POST['so_luong_da_nhap'])&&!empty($_POST['nha_san_xuat'])&&!empty($_POST['danh_muc'])&& !empty($_FILES['anh'])){
		$file          = $_FILES['anh'];
		$imageFileType = strtolower(pathinfo($file["name"],PATHINFO_EXTENSION));
		$file_name     = time(). ".$imageFileType";
		$target_dir    = "../images/";
		$target_file   = $target_dir . $file_name;

		$uploadOk = 1;
		if(isset($_POST["anh"])) {
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
		    $ten_san_pham = $_POST['ten_san_pham'];
		    $gia          = $_POST['gia'];
		    $mo_ta          = $_POST['mo_ta'];
		    $so_luong_da_nhap     = $_POST['so_luong_da_nhap'];
		    $so_luong_ton_kho=$_POST['so_luong_da_nhap'];
		    $ma_nha_san_xuat     = $_POST['nha_san_xuat'];
		    $ma_danh_muc     = $_POST['danh_muc'];
		    $anh          = $target_file;
		    include('connect_database.php');
		    $query = "insert into san_pham(ten_san_pham,gia,mo_ta,so_luong_da_nhap,so_luong_ton_kho,anh,ma_nha_san_xuat,ma_danh_muc) values ('$ten_san_pham','$gia','$mo_ta','$so_luong_da_nhap','$so_luong_ton_kho','$anh','$ma_nha_san_xuat','$ma_danh_muc')";
		    mysqli_query($connect,$query);
		    $error = mysqli_error($connect);
		    mysqli_close($connect);
		    var_dump($error);
		    if(empty($error)){
		        header("location:view_san_pham.php?success_insert");
		    }
		    else{
			header("location:view_san_pham.php?error_insert");
		}
		}
		else{
			header("location:view_san_pham.php?error_insert");
		}
	}
	else{
		header("location:view_san_pham.php?dien_thieu");
	}
	?>
</body>
</html>