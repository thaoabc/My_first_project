<?php
		require('connect_database.php');
		$query='select*from san_pham where ma_danh_muc=2';
		$result=mysqli_query($connect,$query);
		
mysqli_close($connect);
?>
<?php
if (isset($_GET['product_mat_na'])) {?>
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
										
									</div>
									<div class="pages d-flex flex-row align-items-center">
										<?php if(isset($_GET['tim_kiem'])){
											echo "<h6>Có ".$count." sản phẩm được tìm thấy     </h6>";
										}
									 ?>
									</div>

									

								</div>
								<div class="product-grid">
								<?php
							}?>

								<!-- Product Grid -->

								
<?php
		while($row=mysqli_fetch_array($result)){
?>
<div class="product-item accessories">
<div class="product product_filter">
	<div class="product_image">		
		<?php
		echo "<img src='".$row['anh']."'>";
		?>
	</div>
	<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>sale</span></div>
	<?php if (isset($_SESSION['ma_khach_hang'])) {?>
								<a href="san_pham_yeu_thich.php?ma_san_pham=<?php echo $ma_san_pham?>"><div class="favorite favorite_left"></div></a>
							<?php } else{?>
								<form action="form_sign_in.php" method="POST" onsubmit="return confirm('Bạn cần đăng nhập để sử dụng chức năng này!');"><button style="width: 0px;"><div class="favorite favorite_left"></div></button></form>
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
<?php if (isset($_GET['product_mat_na'])) {?></div><?php }?>