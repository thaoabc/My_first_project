<?php
	$ma_khach_hang=$_GET['ma_khach_hang'];

	$connect=mysqli_connect('localhost','root','','duong_da');
	mysqli_set_charset($connect,'utf8');

	$query="select*from khach_hang where ma_khach_hang='$ma_khach_hang'";

	$result=mysqli_query($connect,$query);
	//$row=mysqli_fetch_array($result);
	$row=mysqli_fetch_assoc($result);

	echo json_encode($row);
?>