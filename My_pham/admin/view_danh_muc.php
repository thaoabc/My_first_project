<?php
	require 'kiem_tra_admin.php';
?>
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Colo Shop Categories</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
<link rel="icon" type="images/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSc1v9lUt7z055tlro2f9kICa8yNLz6-Sg8GGJLhstr1ptP1Xpm-g">
<link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="../plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="../styles/categories_styles.css">
<link rel="stylesheet" type="text/css" href="../styles/categories_responsive.css">
<link rel="stylesheet" type="text/css" href="../styles/search.css">
<style type="text/css">
	.dropdown img{
		width: 25px;
		height: 25px;
	}
	img{
		height: 100px;
		width: 100px;
	}
	table{
			margin: auto;
		}
</style>
</head>

<body>

<div class="super_container">

	<!-- Header -->

	<header class="header trans_300">

		<!-- Top Navigation -->

		<!-- Main Navigation -->

		<?php
			include 'main_navigation_admin.php';
		?>

	<div class="container product_section_container">
		
						

						<!-- Product 2 -->

	<?php
	if (isset($_GET['ma_danh_muc'])) {
		include('update_form_danh_muc.php');
	} 
	elseif (isset($_GET['insert_form_danh_muc'])) {
		include('insert_form_danh_muc.php');
	}
	else {

		
		require('connect_database.php');
		$query='select*from danh_muc';
		$result =mysqli_query($connect,$query);
	?>
	<table border="1" width="50%" style="text-align: center;">
		<tr>
			<th colspan="3" style="margin-bottom: 20px;"><a href="view_danh_muc.php?insert_form_danh_muc"><button>Thêm danh mục</button></a></th>
		</tr>
		<tr>
			<th>Mã danh mục</th>
			<th>Tên danh mục</th>
			<th>Sửa</th>
		</tr>
		<?php
			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<td>".$row['ma_danh_muc']."</td>";
				echo "<td>".$row['ten_danh_muc']."</td>";
				echo "<td><a href='view_danh_muc.php?ma_danh_muc=".$row['ma_danh_muc']."'><button>Sửa</button></a></td>";
				echo "</tr>";
			}
		?>
	</table>
	<?php
		mysqli_close($connect);
		if (isset($_GET['success_insert'])) {
			echo '<script language="javascript">';
			echo 'alert("Thêm thành công")';
			echo '</script>';
		}
		elseif (isset($_GET['error_insert'])) {
			echo '<script language="javascript">';
			echo 'alert("Thêm thất bại")';
			echo '</script>';
		}
		elseif (isset($_GET['dien_thieu'])) {
			echo '<script language="javascript">';
			echo 'alert("Bạn phải điền đầy đủ thông tin")';
			echo '</script>';
		}
		elseif (isset($_GET['success_update'])) {
			echo '<script language="javascript">';
			echo 'alert("Sửa thành công")';
			echo '</script>';
		}
		elseif (isset($_GET['error_update'])) {
			echo '<script language="javascript">';
			echo 'alert("Sửa thất bại")';
			echo '</script>';
		}
	}
	?>

	</div>
	<?php
		include 'footer.php';
	?>
</div>

	<!-- Benefit -->

<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../styles/bootstrap4/popper.js"></script>
<script src="../styles/bootstrap4/bootstrap.min.js"></script>
<script src="../plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../plugins/easing/easing.js"></script>
<script src="../plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="../js/categories_custom.js"></script>
</body>

</html>
