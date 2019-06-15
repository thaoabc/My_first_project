<?php

if (isset($_GET['ma_khach_hang']) && isset($_GET['ten_khach_hang']) && isset($_GET['sdt']) && isset($_GET['email'])) {
	$ma_khach_hang=$_GET['ma_khach_hang'];
	$ten_khach_hang=$_GET['ten_khach_hang'];
	$email=$_GET['email'];
	$sdt=$_GET['sdt'];

	$connect=mysqli_connect('localhost','root','','duong_da');
	mysqli_set_charset($connect,'utf8');

	$query="insert into khach_hang(ma_khach_hang,ten_khach_hang,sdt,email) values('$ma_khach_hang','$ten_khach_hang','$sdt','$email')";

	$result=mysqli_query($connect,$query);
	//$row=mysqli_fetch_array($result);
	echo "Thành công";
}

else{
	echo "Thất bại";
}	

?>