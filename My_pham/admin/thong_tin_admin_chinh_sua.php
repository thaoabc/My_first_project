<?php
	if(empty($_SESSION)){
		header("location:form_sign_in_admin.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thông tin khách hàng</title>
	<meta charset="utf-8">
	<style type="text/css">
		input{
			/*width: 400px;*/
			height: 30px;
			padding-left: 10px;
			margin-left: 20px;
			margin-top: 10px;
		}
		table{
			margin: auto;
		}
	</style>
</head>
<body>
	<?php
		$ma_admin=$_GET['success_update'];
		require('connect_database.php');
		$query='select*from admin where ma_admin=$ma_admin ';
		$result=mysqli_query($connect,$query);
		mysqli_close($connect);
		$row=mysqli_fetch_array($result);

	?>

		<input type="hidden" readonly name="ma_admin" value="<?php echo $ma_admin ?>"><br>
		<table>
		<tr>
			<td>Họ và tên:</td>
			<td><input type='text' value="<?php echo $row['ten_admin'] ?>"></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type='email' readonly style='background:#f1f1f1;' value="<?php echo $row['email'] ?>"></td>
		</tr>
		<tr>
			<td>Số điện thoại:</td>
			<td><input type='text' readonly style='background:#f1f1f1;' value="<?php echo $row['sdt'] ?>"></td>
		</tr>
		<tr>
			<td>Mật khẩu:</td>
			<td><input type='password' value="<?php echo $row['mat_khau'] ?>"></td>
		</tr>
		<tr>
			<td>Địa chỉ:</td>
			<td><textarea name="dia_chi"><?php echo $row['dia_chi'] ?></textarea></td>
		</tr>
		<tr>
			<td>Giới tính:</td>
			<?php 
				if($row['gioi_tinh']==0){
				echo "<td><input type='radio' name='gioi_tinh' checked value='0'>Nữ<input type='radio' name='gioi_tinh' value='1'>Nam</td></tr>";
			}
			else{
				echo "<td><input type='radio' name='gioi_tinh' value='0'>Nữ<input type='radio' name='gioi_tinh' checked value='1'>Nam</td></tr>";
			}
			?>
		<tr>
			<td>Cấp độ:</td>
			<?php 
				if($row['cap_do']==1){
				echo "<td><input type='text' readonly style='background:#f1f1f1;' value='SuperAdmin'></td>";
			}
			else{
				echo "<td><input type='text' readonly style='background:#f1f1f1;' value='Admin'></td>";
			}
			?>
		</tr>
	</table>

</body>
</html>