<?php
if(isset($_GET['page'])) {
	$page = $_GET['page'];

switch ($page) {
	case 'Dasboard':
		include "main.php";
		break;
	case 'Registrasi':
		include "data_register.php";
		break;
	case 'Input-Registrasi':
		include "registrasi.php";
		break;
	case 'Edit-Registrasi':
		include "edit_register.php";
		break;
	case 'Update-Status':
		include "update_status.php";
		break;
	case 'Delete-Registrasi':
		include "delete_register.php";
		break;
	case 'Register':
		include "main.php";
		break;
	case 'Activity_log':
		include "activity_log.php";
		break;

	case 'Profile':
		include "profile.php";
		break;
	case 'Setting-Page':
		include "setting_absen.php";
		break;
	case 'Created-Devisi':
		include "created_devisi.php";
		break;

	case 'Data-Register-Employe':
		include "data_registrasi_employe.php";
		break;
	case 'Register-Employe':
		include "registrasi_employe.php";
		break;
	case 'Register-Employe-Upload':
		include "registrasi_employe_upload.php";
		break;
	case 'Register-Employe-Delete':
		include "delete_data_registrasi_employe.php";
		break;


	case 'Data-Attendance':
		include "data_attendance.php";
		break;
	case 'Data-Leave':
		include "data_Leave.php";
		break;
	case 'Report-Attendance':
		include "report_attendance.php";
		break;
	case 'Report-Leave':
		include "report_leave.php";
		break;

	default:
		echo"<center><h3>Maaf, Halaman tidak ditemukan</h3></center>";
		break;
}

}else {
	include "main.php";
}
?>