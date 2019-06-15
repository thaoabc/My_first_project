<?php 
$ma = $_GET['ma'];
session_start();
unset($_SESSION['gio_hang'][$ma]);
header('location:gio_hang.php');