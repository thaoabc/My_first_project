<?php 
	
	$ma_san_pham = $_GET['ma'];
	$ma_khach_hang=$_GET['ma_khach_hang'];
	include 'connect_database.php';
	$query_delete="delete from yeu_thich where ma_khach_hang=$ma_khach_hang and ma_san_pham=$ma_san_pham";
	mysqli_query($connect,$query_delete);
	$query_update="update yeu_thich_nhat set so_lan_yeu_thich=(select count(*) from yeu_thich where ma_san_pham=$ma_san_pham) where ma_san_pham=$ma_san_pham";
	mysqli_query($connect,$query_update);
	mysqli_close($connect);
	header("location:view_san_pham_yeu_thich.php");
