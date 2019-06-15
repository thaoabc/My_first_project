<!DOCTYPE html>
<html>
<head>
	<title>kết nối</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		$connect=mysqli_connect('localhost','root','','my_pham');
		mysqli_set_charset($connect,'utf8');

	?>

</body>
</html>