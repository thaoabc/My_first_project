<?php
		require('connect_database.php');
		$tim_kiem = "";
		if(isset($_GET['tim_kiem'])){
			$tim_kiem = $_GET['tim_kiem'];
		}

		//vào trang đầu tiên
		$trang = 1;
		if(isset($_GET['trang'])){
			$trang = $_GET['trang'];
		}
		//số sp hiển thị trên 1 trang
		$limit = 3;

		//số sản phẩm bỏ qua
		$offset = ($trang-1)*$limit;


		//câu lệnh lấy sản phẩm trong 1 trang
		$query = "select * from san_pham
		join nha_san_xuat
		on san_pham.ma_nha_san_xuat = nha_san_xuat.ma_nha_san_xuat
		where ten_san_pham like '%$tim_kiem%' or ten_nha_san_xuat like '%$tim_kiem%'
		limit $limit offset $offset";
		$result = mysqli_query($connect,$query);
		//lấy tổng số sản phẩm
		$query_count  = "select count(*) from san_pham
		where ten_san_pham like '%$tim_kiem%'";
		$result_count = mysqli_query($connect,$query_count);
		$row_count    = mysqli_fetch_array($result_count);
		$count        = $row_count['count(*)'];
		//số trang
		$so_trang = ceil($count/$limit);

		mysqli_close($connect);
		
	?>

		<!-- $query='select*from san_pham';
		$result=mysqli_query($connect,$query);
		

		while($row=mysqli_fetch_array($result)){
?> -->
<div class="product_sorting_container product_sorting_container_top">
									<ul class="product_sorting">
										<li>
											<span class="type_sorting_text">Phân loại</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_type">
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Mặc định</span></li>
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Giá</span></li>
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Tên sản phẩm</span></li>
											</ul>
										</li>
									</ul>
									
									<div class="pages d-flex flex-row align-items-center">
										<?php for($i=1; $i<=$so_trang; $i++){ ?>
											<a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>"><?php echo "<div class='page_current'>
											<span>".$i."</span>
										</div>" ?></a>
										<?php } ?>

										
										<div class="page_total"><span>of</span> <?php echo $so_trang ?></div>
									</div>
									<div class="pages d-flex flex-row align-items-center">
										<?php if(isset($_GET['tim_kiem'])){
											echo "<h6>Có ".$count." sản phẩm được tìm thấy     </h6>";
										}
									 ?>
									</div>

									

								</div>

								<!-- Product Grid -->

								<div class="product-grid">

<?php while($row=mysqli_fetch_array($result)){
?>

<div class="product-item accessories">
<div class="product product_filter">
	
	<div class="product_image">		
		<?php
		echo "<img src='".$row['anh']."'>";
		?>
	</div>
	<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>sale</span></div>
	<?php if (empty($_SESSION['ma_khach_hang'])) {?>
		<form action="form_sign_in.php" method="POST" onsubmit="return confirm('Bạn cần đăng nhập để sử dụng chức năng này!');"><button style="width: 0px;"><div class="favorite favorite_left"></div></button></form>
								
	<?php } else{?>
		<?php echo "<a href='san_pham_yeu_thich.php?ma_san_pham=".$row['ma_san_pham']."'><div class='favorite favorite_left'></div></a>"; ?>
	<?php }?>
	<div class="product_info">
		<h6 class="product_name">
			<a href="lay_chi_tiet_san_pham.php?ma_san_pham=<?php echo $row['ma_san_pham'] ?>"><?php
					echo $row['ten_san_pham'];
				?>
			</a>
		</h6>
		<div class="product_price">
			<?php
				echo number_format($row['gia'])." VND"
			?>
		</div>
	</div>
</div>
<?php if (isset($_SESSION['ma_khach_hang'])) { ?>
<div class="red_button add_to_cart_button">
<?php
		echo "
	 	<a href='cho_vao_gio_hang.php?ma_san_pham=".$row['ma_san_pham']."'>
		 	
		 		Thêm vào giỏ hàng
		 	
	 	</a>"
 	?>
</div>
<?php } else{?>
	<form action="form_sign_in.php" method="POST" onsubmit="return confirm('Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng!');"><input class="red_button add_to_cart_button" type="submit" value="Thêm vào giỏ hàng"></form>
<?php } ?>
</div>

<?php
	}
?>
</div>

