<?php
include_once "asset/_lib/config.php";
if ($user->logout()) {
	$user->redirect('index.php');
}
?>