<!DOCTYPE html>
<html>
<head>
	<title>Sửa sản phẩm</title>
	<meta charset="utf-8">
	<style type="text/css">
		table{
			margin: auto;
		}
		img{
			height: 235px;
			width: 235px;
		}
	</style>
</head>
<body>
	
	<?php
		include('connect_database.php');
		$ma_san_pham=$_GET['ma_san_pham_update'];
		$query="select*from san_pham 
				join nha_san_xuat on san_pham.ma_nha_san_xuat=nha_san_xuat.ma_nha_san_xuat
				join danh_muc on san_pham.ma_danh_muc=danh_muc.ma_danh_muc
				where ma_san_pham='$ma_san_pham' limit 1";
		$result=mysqli_query($connect,$query);
		$row=mysqli_fetch_array($result);
	?>

	<form action="update_process_san_pham.php" method="post" enctype="multipart/form-data">
		<input type="hidden" readonly name="ma_san_pham" value="<?php echo $row['ma_san_pham'] ?>">
		<table>
			<tr><td>Tên sản phẩm:</td><td>
				<input type="text" name="ten_san_pham" value="<?php echo $row['ten_san_pham'] ?>"></td></tr>
			<tr><td>Số lượng đã nhập:</td><td>
			<input type="text" name="so_luong_da_nhap" value="<?php echo $row['so_luong_da_nhap'] ?>"></td></tr>
			<tr><td>Số lượng tồn kho:</td><td>
			<input type="text" name="so_luong_ton_kho" value="<?php echo $row['so_luong_ton_kho'] ?>"></td></tr>
			<tr><td>Giá:</td><td>
			<input type="number" name="gia" value="<?php echo $row['gia'] ?>"></td></tr>
			<tr><td>Mô tả:</td><td>
				<textarea name="mo_ta"><?php echo $row['mo_ta'] ?></textarea></td></tr>
			<tr><td>
			<input type="hidden" name="ma_nha_san_xuat" value="<?php echo $row['ma_nha_san_xuat'] ?>"></td></tr>
			<tr><td>Tên nhà sản xuất:</td><td>
				<select name="nha_san_xuat">
					<?php if ($row['ma_nha_san_xuat']==1) { ?>
						<option value="1" selected>Việt Nam</option>

					<?php } ?>
					<?php if ($row['ma_nha_san_xuat']==2) { ?>
						<option value="2" selected>Farmasi</option>

					<?php } ?>
					<?php if ($row['ma_nha_san_xuat']==3) { ?>
						<option value="3" selected>China</option>

					<?php } ?>
					<?php if ($row['ma_nha_san_xuat']==4) { ?>
						<option value="4" selected>Nga</option>

					<?php } ?>
					<?php if ($row['ma_nha_san_xuat']==6) { ?>
						<option value="6" selected>Đức</option>

					<?php } ?>
					<?php if ($row['ma_nha_san_xuat']==7) { ?>
						<option value="7" selected>Hàn quốc</option>

					<?php } ?>
					<option value="1">Việt Nam</option>
					<option value="2">Farmasi</option>
					<option value="3">China</option>
					<option value="4">Nga</option>
					<option value="6">Đức</option>
					<option value="7">Hàn quốc</option>
				</select>
			</td></tr>
			<tr><td>Danh mục:</td><td>
				<select name="danh_muc">
					<?php if ($row['ma_danh_muc']==1) { ?>
						<option value="1" selected>Sữa rửa mặt</option>

					<?php } ?>
					<?php if ($row['ma_danh_muc']==2) { ?>
						<option value="2" selected>Mặt nạ</option>

					<?php } ?>
					<?php if ($row['ma_danh_muc']==3) { ?>
						<option value="3" selected>Tẩy trang</option>

					<?php } ?>
					<option value="1">Sữa rửa mặt</option>
					<option value="2">Mặt nạ</option>
					<option value="3">Tẩy trang</option>
				</select>
			</td></tr>
			<tr><td>Ảnh cũ:</td><td>
				<img src="<?php echo $row['anh'] ?>">
				<input type="hidden" name="anh_cu" value="<?php echo $row['anh'] ?>">
			</td></tr>
			<tr><td>Đổi ảnh mới ở đây:</td><td>
				<input type="file" name="anh_moi" accept="image/*"></td></tr>
			<tr><td colspan="2" style="text-align: center;"><button style="margin-top: 20px;" name="sua_san_pham">Lưu thông tin mới</button></td></tr>
		</table>
	</form>
</body>
</html>