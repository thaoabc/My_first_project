<?php session_start();
	if(empty($_SESSION['ma_khach_hang'])){
		header("location:website_ban_hang.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thông tin khách hàng</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Colo Shop Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link rel="icon" type="images/x-icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSc1v9lUt7z055tlro2f9kICa8yNLz6-Sg8GGJLhstr1ptP1Xpm-g">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="styles/categories_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
	<link rel="stylesheet" type="text/css" href="styles/search.css">
	<style type="text/css">
		.dropdown img{
			width: 25px;
			height: 25px;
		}
		img{
			height: 120px;
			width: 120px;
		}
	</style>
	<style type="text/css">
		table{
			text-align: center;
		}
		a{
			text-decoration: none;
			color: black;
		}
		tr:hover{
			background-color: #E6E6E6;
			height: 150px;
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
			include 'main_navigation.php';
		?>
		<div class="container product_section_container">
			<div class="row">
				<div class="col product_section clearfix">

					<!-- Breadcrumbs -->

					<div class="breadcrumbs d-flex flex-row align-items-center">
						<ul>
							<li><a href="index.php"></a></li>
							
						</ul>
					</div>
				
				<div style="float: left;" class="main_content">

					<!-- Products -->

					<div  class="main_content">

					<!-- Products -->

					<div class="products_iso">
						<div class="row">
							<div class="col">
					
						<?php
		if(empty($_SESSION['ma_khach_hang'])){
			header("location:website_khach_hang.php");
		}
		else{
			$ma_khach_hang=$_SESSION['ma_khach_hang'];
			require('connect_database.php');
			$query_khach_hang="select*from khach_hang where ma_khach_hang='$ma_khach_hang'";
				$result_khach_hang = mysqli_query($connect,$query_khach_hang);
				$row_khach_hang = mysqli_fetch_array($result_khach_hang);
				$ten_khach_hang=$row_khach_hang['ten_khach_hang'];
			$query = "select * from khach_hang
					join yeu_thich on khach_hang.ma_khach_hang=yeu_thich.ma_khach_hang
					join san_pham on san_pham.ma_san_pham=yeu_thich.ma_san_pham
					where ten_khach_hang = '$ten_khach_hang'";
			$result = mysqli_query($connect,$query);
			$array_khach_hang = array();
			$count = mysqli_num_rows($result);
			if($count==0){
				echo "<table style='margin:auto;'>
					<tr>
						<td><h3>Chưa có sản phẩm nào được chọn</h3></td>
					</tr>
					<tr>
						<td><a href='website_khach_hang.php?co_tai_khoan'><button style='margin-top: 20px;'>Tiếp tục mua sắm</button></a></td>
					</tr>
						</table>
					";
			}
			else{ 
				while($row = mysqli_fetch_array($result)){
					$ma_san_pham=$row['ma_san_pham'];
					
					$array_khach_hang[$ma_san_pham]['ten_san_pham']=$row['ten_san_pham'];
					$array_khach_hang[$ma_san_pham]['anh']=$row['anh'];
					$array_khach_hang[$ma_san_pham]['gia']=$row['gia'];
				}
			?>
				<table style="width: 800px;">
			<?php	foreach($array_khach_hang as $ma_san_pham => $each_san_pham){ ?>
					 	<tr>
							<td>
							<a href='lay_chi_tiet_san_pham.php?ma_san_pham=<?php echo $ma_san_pham ?>'><?php echo "<img src='".$each_san_pham['anh']."'>";?></a></td>
							<td><a href="lay_chi_tiet_san_pham.php?ma_san_pham=<?php echo $ma_san_pham ?>"><?php echo $each_san_pham['ten_san_pham']; ?></a></td>
							<td><?php echo number_format($each_san_pham['gia'])." VND"; ?></td>
							<?php
								echo "<td><a href='xoa_san_pham_yeu_thich.php?ma=".$ma_san_pham."&ma_khach_hang=$ma_khach_hang'>Xóa</a></td>"
							?>
							
						</tr>

					<?php }
					
				 ?>
				</table>
			 <?php }
		}
		
	?>			 		</div>
					</div>
				</div>
			</div>
		</div>			
			
		</div>
	</div>
</div>
<?php
	include 'footer.php';
?>
</div>


</body>
</html>