<!DOCTYPE html>
<html>
<head>
	<title>Xem giỏ hàng</title>
	<meta charset="utf-8">
	<style type="text/css">
		img{
			height: 150px;
			width: 150px;
		}
		a{
			text-decoration: none;
			color: black;
		}
		table{
			text-align: center;
		}
		input{
			width: 30px;
			text-align: center;
		}
		tr:hover{
			background-color: #E6E6E6;
		}
	</style>
</head>
<body>
	<?php
		if (!empty($_SESSION['gio_hang'])) {

	?>
	<div class="main_content">

					<!-- Products -->

		<div class="products_iso">
			<div class="row">
				<div class="col">
					<table style="padding-left: 0px;width: 800px;">
						<?php
							$tong=0;
							$so_luong=0;
							foreach ($_SESSION['gio_hang'] as $ma_san_pham => $san_pham) {
								
						?>
						<tr>
							<td style="height: 200px; width: 200px">
							<a href='lay_chi_tiet_san_pham.php?ma_san_pham=<?php echo $ma_san_pham ?>'><?php echo "<img src='".$san_pham['anh']."'>";?></a></td>
							<td><a href="lay_chi_tiet_san_pham.php?ma_san_pham=<?php echo $ma_san_pham ?>"><?php echo $san_pham['ten_san_pham']; ?></a></td>
							<td><?php echo number_format($san_pham['gia'])." VND"; ?></td>
							<td>
								<a href="thay_doi_so_luong.php?giam=<?php echo $ma_san_pham ?>"><input type="text" readonly name="tru" value="-"></a><input type="text" readonly name="so_luong" value="<?php echo $san_pham['so_luong']; ?>"><a href="thay_doi_so_luong.php?tang=<?php echo $ma_san_pham ?>"><input type="text" readonly name="cong" value="+"></a>
							</td>
							<?php
								echo "<td><a href='xoa_san_pham_trong_gio.php?ma=".$ma_san_pham."'>Xóa</a></td>"
							?>
							
						</tr>
						<?php
							$tong= $tong + $san_pham['gia'] * $san_pham['so_luong'];
							$so_luong=$so_luong+$san_pham['so_luong'];
							}
							if ($tong==0) {
								
								unset($_SESSION['gio_hang']);
								echo "<table style='text-align: center; margin:auto;'>
								<tr>
									<td><h3>Giỏ hàng trống</h3></td>
								</tr>
								<tr>
									<td><a href='website_khach_hang.php?co_tai_khoan'><button style='margin-top: 20px;'>Mua sản phẩm mới</button></a></td>
								</tr>
							</table>"
								;
							}
						?>
						
					</table>
				</div>
			</div>
		</div>
	</div>
	<div id="div_phai" class="sidebar">
		<div class="sidebar_section">
			
		</div>

		<!-- Price Range Filtering -->
		<div class="sidebar_section">
			
			<a href='website_khach_hang.php?co_tai_khoan'><button>Mua sản phẩm mới</button></a>

		</div>

		<!-- Sizes -->
		<div class="sidebar_section">

			<a href="thong_tin_dat_hang.php?dat_hang"><button name="dat_hang" value="1">Đặt Hàng</button></a>
		</div>

		<!-- Color -->
		<div class="sidebar_section">
			<h4>Tổng đơn hàng: <br><?php echo number_format($tong)." VND" ?></h4>
			
		</div>
		

</div>
		
	<?php
	
	}
	else{
		echo "<table style='text-align: center; margin:auto;'>
				<tr>
					<td><h3>Giỏ hàng trống</h3></td>
				</tr>
				<tr>
					<td><a href='website_khach_hang.php?co_tai_khoan'><button style='margin-top: 20px;'>Mua sản phẩm mới</button></a></td>
				</tr>
			</table>
		";
	}
	?>

</body>
</html>