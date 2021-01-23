<?php
include_once "asset/_lib/config.php";

if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}

if (isset($_GET['femail']) && !empty($_GET['femail'])) {
    $femail = $_GET['femail'];
    $activity = $user->show_activity($femail);
}else{
    echo "Data Tidak Ada";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Activity_log</h1>
                    <hr class="sidebar-divider">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Activity_log</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive my-2">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="headTable">No</th>
                                            <th class="headTable">Tanggal</th>
                                            <th class="headTable">Expired</th>
                                            <th class="headTable">Username</th>
                                            <th class="headTable">IP</th>
                                            <th class="headTable">Device</th>
                                            <th class="headTable">Status</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no = 1;
                                    foreach ($activity as $row) 
                                    {
                                        if ($row['status'] != 1) {
                                            $err ='alert alert-danger';
                                        }else{
                                            $err = 'alert alert-success';
                                        }
                                        echo "<tbody>";
                                            echo"<tr>";
                                                echo"<td class='bodyTable ".$err."'>".$no."</td>";
                                                echo"<td class='bodyTable ".$err."'>".$row['tanggal']."</td>";
                                                echo"<td class='bodyTable ".$err."'>".$row['expired']."</td>";
                                                echo"<td class='bodyTable ".$err."'>".$row['username']."</td>";
                                                echo"<td class='bodyTable ".$err."'>".$row['ip']."</td>";
                                                echo"<td class='bodyTable ".$err."'>".$row['useragent']."</td>";
                                                echo"<td class='bodyTable ".$err."'>".$row['status']."</td>";
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
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

</body>

</html>