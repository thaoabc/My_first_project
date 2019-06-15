<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<style type="text/css">
		#success{
			color: green;
		}
		#error{
			color: red;
		}
		table{
			margin: auto;
		}
	</style>
</head>
<body>

	<form action="insert_proccess_san_pham.php" method="post" enctype="multipart/form-data">
		<table >
			<tr><td>Tên sản phẩm:</td><td>
				<input type="text" name="ten_san_pham"></td></tr>
			<tr><td>Giá:</td><td>
				<input type="number" name="gia"></td></tr>
			<tr><td>Mô tả:</td><td>
				<textarea name="mo_ta"></textarea></td></tr>
			<tr><td>Số lượng đã nhập:</td><td>
				<input type="number" name="so_luong_da_nhap"></td></tr>
			<tr><td>Nhà sản xuất:</td><td>
				<select name="nha_san_xuat">
					<option value="1">Việt Nam</option>
					<option value="2">Farmasi</option>
					<option value="3">China</option>
					<option value="4">Nga</option>
					<option value="6">Đức</option>
					<option value="7">Hàn quốc</option>
				</select>
			<tr><td>Danh mục:</td><td>
				<select name="danh_muc">
					<option value="1">Sữa rửa mặt</option>
					<option value="2">Mặt nạ</option>
					<option value="3">Tẩy trang</option>
				</select>
			<tr><td>Ảnh:</td><td>
				<input type="file" name="anh" accept="image/*"></td></tr>
			<tr><td colspan="2" style="text-align: center;" >
				<button style="margin-top: 20px;" name="submit" value="1">Thêm sản phẩm</button>
			</td></tr>
		</table>
	</form>

</body>
</html>