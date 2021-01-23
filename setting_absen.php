<?php
include_once "asset/_lib/config.php";

if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Setting Absen</h1>
</div>
<div class="row">
	<div class="col-xs-8 col-lg-7">
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Devisi</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="dasboard.php?page=Created-Devisi">Tambaha Devisi</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive my-0">
                    <div class="col-md-12">
                    <hr class="sidebar-divider">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th class="bodyTable">No</th>
                            <th class="bodyTable">Kode Devisi</th>
                            <th class="bodyTable">Devisi</th>
                        </tr>
                        </thead>
                        <?php
                        $dataDevisi = $user->devisi();
                        $no=1;
                        foreach ($dataDevisi as $data) {
                            echo"<tbody>";
                            echo"<tr>";
                                echo"<td class='bodyTable'>".$no."</td>";
                                echo"<td class='bodyTable'>".$data['KODE']."</td>";
                                echo"<td class='bodyTable'>".$data['DEVISI']."</td>";
                            echo"</tr>";
                            echo"</tbody>";
                            $no++;
                        }
                        ?>
                    </table>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
</body>
</html>