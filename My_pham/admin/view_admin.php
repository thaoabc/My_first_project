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
	<?php
	if (isset($_GET['ma_admin'])) {
		include('update_form_admin.php');
	} 
	else {
		
	?>
	<?php
		require('connect_database.php');
		$query='select*from admin';
		$result=mysqli_query($connect,$query);
		mysqli_close($connect);
	?>
	<table border="1" width="100%" style="text-align: center;">
		<tr>
			<th colspan="9" ><a href="sign_up_admin.php"><button style="margin-top: 10px; margin-bottom: 10px;">Thêm admin</button style="margin-bottom: 10px; margin-top: 10px"></a></th>
		</tr>
		<tr>
			<th>Mã admin</th>
			<th>Tên admin</th>
			<th>Số điện thoại</th>
			<th>Email</th>
			<th>Mật khẩu</th>
			<th>Địa chỉ</th>
			<th>Giới tính</th>
			<th>Cấp độ</th>
			<th>Sửa</th>
		</tr>
		<?php
		while ($row=mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$row['ma_admin']."</td>";
			echo "<td>".$row['ten_admin']."</td>";
			echo "<td>".$row['sdt']."</td>";
			echo "<td>".$row['email']."</td>";
			echo "<td>".$row['mat_khau']."</td>";
			echo "<td>".$row['dia_chi']."</td>";
			if($row['gioi_tinh']==0){
				echo "<td>Nữ</td>";
			}
			else{
				echo "<td>Nam</td>";
			}
			
			if($row['cap_do']==1){
				echo "<td>Super admin</td>";
			}
			elseif ($row['cap_do']==2) {
				echo "<td>Admin</td>";
			}
			else{
				echo "<td>Khách hàng</td>";
			}
			echo "<td><a href='view_admin.php?ma_admin=".$row['ma_admin']."'><button>Sửa</button></a></td>";
			echo "</tr>";
		}
		?>
	</table>

	<?php
		if (isset($_GET['success_insert'])) {
			echo '<script language="javascript">';
			echo 'alert("Thêm thành công")';
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
		elseif (isset($_GET['success_delete'])) {
			echo '<script language="javascript">';
			echo 'alert("Xóa thành công")';
			echo '</script>';
		}
		elseif (isset($_GET['error_delete'])) {
			echo '<script language="javascript">';
			echo 'alert("Xóa không thành công")';
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
