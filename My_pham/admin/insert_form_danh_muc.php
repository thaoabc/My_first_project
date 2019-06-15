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
		form{
			text-align: center;
		}
	</style>
</head>
<body>

	<form action="insert_proccess_danh_muct.php" method="post" enctype="multipart/form-data">
		Tên danh mục:<input type="text" name="ten_danh_muc"><br>
		<button name="submit" value="1">Thêm danh mục</button>
		
	</form>

</body>
</html>