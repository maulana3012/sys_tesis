<?php
include_once "asset/_lib/config.php";
$login_status = $user->cek_login();
if($login_status){
	//bawa ke halaman home
	header('Location:dasboard.php');
	// exit();
}
else{
	//include form log in jika belum log in
	include "login.php";
}
?>