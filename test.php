<?php
include_once "asset/_lib/config.php";

if (isset($_GET['fid'])) {
  // $fid = '19185';
  $fid = $_GET['fid'];
  $row = $user->show_karyawan_nik($fid);
  $data = $row['NIK'];
}
// echo $data;
 echo shell_exec("py D:/SISTEM/SISTEM/sys_tesis/connect.py $data");
// echo shell_exec("py D:/SISTEM/SISTEM/sys_tesis/test.py $data");
?>