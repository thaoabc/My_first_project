<?php
	session_start();
	if(empty($_SESSION['ma_admin'])){
		header("location:form_sign_in_admin.php");
	}
?>