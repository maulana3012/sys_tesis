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

if (isset($_GET['fid']) && !empty($_GET['fid'])) {
    $fid = $_GET['fid'];
    $fstatus = 2;
    $delRegister = $user->delete_regits($fid,$fstatus);

    if ($delRegister) {
        $error[] = "Data Dinonaktivkan...!";
        header('Location: data_register.php');
    }else{
        echo "Gagal Menghapus Data";
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
                    <h1 class="h3 mb-2 text-gray-800">Delete User Management</h1>
                    <hr class="sidebar-divider">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Delete DataTables User Management</h6>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="float-right">
                                            <small>Type : </small><br>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                              <a href="dasboard.php?page=Delete-Registrasi" class="btn btn-outline-info">
                                                <i class="fa fa-globe"></i>&nbsp;All
                                              </a>
                                              <a href="dasboard.php?page=Delete-Registrasi&fstatus=1" class="btn btn-outline-info">
                                                <i class="fa fa-user"></i>&nbsp;Active
                                              </a>
                                              <a href="dasboard.php?page=Delete-Registrasi&fstatus=2" class="btn btn-outline-info">
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
                                            if ($row['STATUS'] == 2) {
                                                if ($Manager == 1 || $Admin == 1 || $Developer == 1) {
                                                    echo "<th class='headTable'>Action</th>";
                                                }elseif ($Dadmin == 1) {
                                                    echo "<th class='headTable'>Action</th>";
                                                }else{
                                                   echo null;
                                                }
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    <?php
                                    foreach ($dataRegister as $row) 
                                    {

                                        echo "<tbody>";
                                            echo"<tr>";
                                                echo"<td class='bodyTable'>".$row['FRISTNAME']." ".$row['LASTNAME']."</td>";
                                                echo"<td class='bodyTable'>".$row['EMAIL']."</td>";
                                                if ($row['USERMANAGER'] == 1) {
                                                    echo "<td class='bodyTable'>"."<input type = 'checkbox' checked='checked'/>"."</td>";
                                                }else {
                                                    echo "<td class='bodyTable'>"."<input type = 'checkbox'/>"."</td>";
                                                }

                                                if ($row['ADMINISTRATOR'] == 1) {
                                                    echo "<td class='bodyTable'>"."<input type = 'checkbox' checked='checked'/>"."</td>";
                                                }else {
                                                    echo "<td class='bodyTable'>"."<input type = 'checkbox'/>"."</td>";
                                                }

                                                if ($row['DEVELOPER'] == 1) {
                                                    echo "<td class='bodyTable'>"."<input type = 'checkbox' checked='checked'/>"."</td>";
                                                }else {
                                                    echo "<td class='bodyTable'>"."<input type = 'checkbox'/>"."</td>";
                                                }

                                                if ($row['DATA_ADMINISTRATOR'] == 1) {
                                                    echo "<td class='bodyTable'>"."<input type = 'checkbox' checked='checked'/>"."</td>";
                                                }else {
                                                    echo "<td class='bodyTable'>"."<input type = 'checkbox'/>"."</td>";
                                                }

                                                if ($row['REPORTING'] == 1) {
                                                    echo "<td class='bodyTable'>"."<input type = 'checkbox' checked='checked'/>"."</td>";
                                                }else {
                                                    echo "<td class='bodyTable'>"."<input type = 'checkbox'/>"."</td>";
                                                }

                                                if ($row['READONLY'] == 1) {
                                                    echo "<td class='bodyTable'>"."<input type = 'checkbox' checked='checked'/>"."</td>";
                                                }else {
                                                    echo "<td class='bodyTable'>"."<input type = 'checkbox'/>"."</td>";
                                                }

                                                if ($row['PROJECTCREATOR'] == 1) {
                                                    echo "<td class='bodyTable'>"."<input type = 'checkbox' checked='checked'/>"."</td>";
                                                }else {
                                                    echo "<td class='bodyTable'>"."<input type = 'checkbox'/>"."</td>";
                                                }

                                                
                                                if ($row['STATUS'] == 2) {
                                                    if ($Manager == 1 || $Admin == 1 || $Developer == 1) {
                                                        echo "<td class='bodyTable'>
                                                        <a class='btn btn-danger' href='dasboard.php?page=Registrasi&fid=".$row['ID']."'><i class='fa fa-trash'></i></a>
                                                        </td>";
                                                    }else{
                                                        echo null;
                                                    }
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