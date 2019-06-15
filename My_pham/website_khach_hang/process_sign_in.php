<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Xử lý đăng nhập</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		if(!isset($_POST['dang_nhap'])){
			header("location:form_sign_in.php?error_sign_in");
		}
		else{
			$email=$_POST['email'];
			$mat_khau=$_POST['mat_khau'];

			include('connect_database.php');
			$query="select*from khach_hang where email='$email' and mat_khau='$mat_khau'";
			$result=mysqli_query($connect,$query);
			mysqli_close($connect);
			$row=mysqli_fetch_array($result);
			$count = mysqli_num_rows($result);
			if($count==0){
				header("location:form_sign_in.php?empty_data");
			}
			
			else{

				if(isset($_POST['cookie'])){
					setcookie('$row[\'ma_khach_hang\']',$row['ma_khach_hang'],time()+86400*60);
				}

				$_SESSION['ma_khach_hang']=$row['ma_khach_hang'];
				$_SESSION['ten_khach_hang']=$row['ten_khach_hang'];
				$_SESSION['sdt']=$row['sdt'];
				$_SESSION['email']=$row['email'];
				$_SESSION['mat_khau']=$row['mat_khau'];
				$_SESSION['ngay_sinh']=$row['ngay_sinh'];
				$_SESSION['dia_chi']=$row['dia_chi'];
				$_SESSION['gioi_tinh']=$row['gioi_tinh'];
				
				header("location:website_khach_hang.php");
			}
		}
	?>

</body>
</html>