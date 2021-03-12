<?php
session_start();
DEFINE('HOST','OFFLINE');
error_reporting(0);
if (HOST == 'ONLINE') {
	DEFINE('DB_NAME', '');
	DEFINE('DB_USER', '');
	DEFINE('DB_PASSWORD', '');
	DEFINE('DB_HOST', '');
	DEFINE('HOME_URL', '');
	DEFINE('HOME_PATH', '');
	DEFINE('HOME_AJAX', '');
	DEFINE('TB_INMG', 'tb_images');
}else{
	DEFINE('DB_NAME', 'db_api');
	DEFINE('DB_USER', 'root');
	DEFINE('DB_PASSWORD', '');
	DEFINE('DB_HOST', 'localhost');
	DEFINE('HOME_URL', '<a class="vglnk" href="http://localhost/tesis/Adminstrasi/index.php" rel="nofollow">');
	DEFINE('HOME_PATH', '<a class="vglnk" href="http://localhost/tesis/Adminstrasi/index.php" rel="nofollow">');
	DEFINE('HOME_AJAX', '');
	DEFINE('TB_INMG', 'tb_images');
}

try {
	  $dsn = "mysql:dbname=".DB_NAME.";host=".DB_HOST."";
      $db_con = new PDO($dsn, DB_USER, DB_PASSWORD);
      $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }
   catch(PDOException $e){
      echo "A connection could not be established to ".$_SERVER['SERVER_ADDR']."The following error has occurred:" . $e->getMessage()."";
   }

require_once "_php-facedetection/FaceDetector.php";
require_once "class.user.php";
require_once "library.php";

$link_eov				 = "http://localhost/LDP-ZURICH/?uid=";
$file_name_log 		 	 = "logs/api-log".date("Ymd").".txt";
$file_name_log_SFTP 	 = "logs/SFTP/api-log-sftp".date("Ymd").".txt";
$file_name_log_create    = "logs/create/api-log-create".date("Ymd").".txt";
$file_name_log_check 	 = "logs/check/api-log-check".date("Ymd").".txt";
$file_name_log_parsing 	 = "logs/parse/api-log-parse".date("Ymd").".txt";
$file_name_log_generated = "logs/generate/api-log-generate".date("Ymd").".txt";

$user = new USER ($db_con);
$detector = new svay\FaceDetector('detection.dat');
?>