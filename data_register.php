<?php
include_once "asset/_lib/config.php";

if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}

if (isset($_GET['fstatus']) && !empty($_GET['fstatus'])) {
    $fstatus = $_GET['fstatus'];
    $dataRegister = $user->show_regist_status($fstatus);
}else{
    $dataRegister = $user->show_regist();
}

if (isset($_GET['fid'])) {
    $fid = $_GET['fid'];
    $update = $user->status_regist($fid);
    if (!empty($update)) {
        echo "<script>window.location.href='dasboard.php?page=Registrasi'</script>";
        exit();
    }else{
        $error[] = "Gagal Update Status....!";
    }
}

if (isset($_GET['fid'])) {
    $fid = $_GET['fid'];
    $update = $user->delete_regits($fid);
    if (!empty($update)) {
        echo "<script>window.location.href='dasboard.php?page=Registrasi'</script>";
        exit();
    }else{
        $error[] = "Gagal Update Status....!";
    }
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
                    <?php
                        if(isset($error))
                        {
                           foreach($error as $error)
                           {
                              ?>
                              <div class="alert alert-danger">
                                  <i class="fa fa-exclamation-circle"></i> &nbsp; <?php echo $error; ?>
                              </div>
                              <?php
                           }
                        }
                    ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">User Management</h1>
                    <hr class="sidebar-divider">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables User Management</h6>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="float-left">
                                            <?php
                                                if ($Manager == 1 || $Admin == 1 || $Developer == 1) {
                                                    echo "
                                                    <a href='dasboard.php?page=Input-Registrasi' class='btn btn-sm btn-outline-primary'><i class='fa fa-plus'></i>&nbsp;Add New User</a>";
                                                }else{
                                                    $error[] = "premision anda salah..!";
                                                }
                                            ?>
                                            
                                            <a href="#" class="btn btn-sm btn-outline-info">
                                                <i class="fa fa-question-circle"></i>&nbsp;Permission details
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="float-right">
                                            <small>Type : </small><br>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                              <a href="dasboard.php?page=Registrasi" class="btn btn-outline-info">
                                                <i class="fa fa-globe"></i>&nbsp;All
                                              </a>
                                              <a href="dasboard.php?page=Registrasi&fstatus=1" class="btn btn-outline-info">
                                                <i class="fa fa-user"></i>&nbsp;Active
                                              </a>
                                              <a href="dasboard.php?page=Registrasi&fstatus=2" class="btn btn-outline-info">
                                                <i class="fa fa-user"></i>&nbsp;Nonactive
                                              </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive my-2">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="headTable">Name</th>
                                            <th class="headTable">Email</th>
                                            <th class="headTable">User Manager</th>
                                            <th class="headTable">Administrator</th>
                                            <th class="headTable">Developer</th>
                                            <th class="headTable">Data Administrator</th>
                                            <th class="headTable">Reporting</th>
                                            <th class="headTable">Read Only</th>
                                            <th class="headTable">Project Creator</th>
                                            <?php
                                            if ($Manager == 1 || $Admin == 1 || $Developer == 1) {
                                                echo "<th class='headTable'>Status</th>";
                                                echo "<th class='headTable'>Action</th>";
                                            }elseif ($Dadmin == 1) {
                                                echo "<th class='headTable'>Action</th>";
                                            }else{
                                               echo null;
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    <?php
                                    foreach ($dataRegister as $row) 
                                    {
                                        if ($row['STATUS'] != 1) {
                                            $err ='alert alert-danger';
                                        }else{
                                            $err = 'alert alert-success';
                                        }

                                        echo "<tbody>";
                                            echo"<tr>";
                                                echo"<td class='bodyTable ".$err."'>".$row['FRISTNAME']." ".$row['LASTNAME']."</td>";
                                                echo"<td class='bodyTable ".$err."'>".$row['EMAIL']."</td>";
                                                if ($row['USERMANAGER'] == 1) {
                                                    echo "<td class='bodyTable ".$err."'>"."<input type = 'checkbox' checked='checked'/>"."</td>";
                                                }else {
                                                    echo "<td class='bodyTable ".$err."'>"."<input type = 'checkbox'/>"."</td>";
                                                }

                                                if ($row['ADMINISTRATOR'] == 1) {
                                                    echo "<td class='bodyTable ".$err."'>"."<input type = 'checkbox' checked='checked'/>"."</td>";
                                                }else {
                                                    echo "<td class='bodyTable ".$err."'>"."<input type = 'checkbox'/>"."</td>";
                                                }

                                                if ($row['DEVELOPER'] == 1) {
                                                    echo "<td class='bodyTable ".$err."'>"."<input type = 'checkbox' checked='checked'/>"."</td>";
                                                }else {
                                                    echo "<td class='bodyTable ".$err."'>"."<input type = 'checkbox'/>"."</td>";
                                                }

                                                if ($row['DATA_ADMINISTRATOR'] == 1) {
                                                    echo "<td class='bodyTable ".$err."'>"."<input type = 'checkbox' checked='checked'/>"."</td>";
                                                }else {
                                                    echo "<td class='bodyTable ".$err."'>"."<input type = 'checkbox'/>"."</td>";
                                                }

                                                if ($row['REPORTING'] == 1) {
                                                    echo "<td class='bodyTable ".$err."'>"."<input type = 'checkbox' checked='checked'/>"."</td>";
                                                }else {
                                                    echo "<td class='bodyTable ".$err."'>"."<input type = 'checkbox'/>"."</td>";
                                                }

                                                if ($row['READONLY'] == 1) {
                                                    echo "<td class='bodyTable ".$err."'>"."<input type = 'checkbox' checked='checked'/>"."</td>";
                                                }else {
                                                    echo "<td class='bodyTable ".$err."'>"."<input type = 'checkbox'/>"."</td>";
                                                }

                                                if ($row['PROJECTCREATOR'] == 1) {
                                                    echo "<td class='bodyTable ".$err."'>"."<input type = 'checkbox' checked='checked'/>"."</td>";
                                                }else {
                                                    echo "<td class='bodyTable ".$err."'>"."<input type = 'checkbox'/>"."</td>";
                                                }

                                                if ($row['STATUS'] == 1) {
                                                    $status = "<p class='btn btn-sm btn-success'><i class='fa fa-check'></i> Active</p>";
                                                }else{
                                                    $status = "<p class='btn btn-sm btn-danger'><i class='fa fa-times'></i> Nonactive</p>";
                                                }

                                                
                                                if ($Manager == 1 || $Admin == 1 || $Developer == 1) {
                                                    echo"<td class='bodyTable ".$err."'>"."<a href='dasboard.php?page=Registrasi&fid=".$row['ID']."'>".$status."</a>"."</td>";
                                                    echo "<td class='bodyTable ".$err."'>
                                                    <a class='btn btn-sm btn-info' href='dasboard.php?page=Edit-Registrasi&fid=".$row['ID']."'><i class='fa fa-eye' aria-hidden='true'></i> View</a>
                                                    </td>";
                                                }elseif ($Dadmin == 1) {
                                                    echo "<td class='bodyTable ".$err."'>
                                                    <a class='btn btn-info' href='dasboard.php?page=Edit-Registrasi&fid=".$row['ID']."'><i class='fa fa-pencil'></i></a>
                                                    </td>";
                                                }else{
                                                    echo null;
                                                }
                                            echo"</tr>";
                                        echo"</tbody>";
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