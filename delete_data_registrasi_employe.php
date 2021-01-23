<?php
include_once "asset/_lib/config.php";

if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}

if (isset($_GET['fstatus']) && !empty($_GET['fstatus'])) {
    $fstatus = $_GET['fstatus'];
    $dataKaryawan = $user->show_karyawan_status($fstatus);
}else{
    $dataKaryawan = $user->show_karyawan();
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
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Delete Register Employe</h1>
                    <hr class="sidebar-divider">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Delete Employe</h6>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <small>Search : </small><br>
                                                <div class="input-group mb-3">
                                                  <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                                                  <div class="input-group-append">
                                                    <button class="btn btn-outline-success" type="button"><i class="fa fa-search"></i></button>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <small></small><br>
                                                <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Devisi</label>
                                                  </div>
                                                  <select class="custom-select" id="inputGroupSelect01">
                                                    <option selected>Choose...</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                  </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <small></small><br>
                                                <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                    <label class="input-group-text" for="inputGroupSelect01">Jabatan</label>
                                                  </div>
                                                  <select class="custom-select" id="inputGroupSelect01">
                                                    <option selected>Choose...</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                  </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="float-right">
                                            <small>Type : </small><br>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                              <a href="dasboard.php?page=Register-Employe-Delete" class="btn btn-outline-info">
                                                <i class="fa fa-globe"></i>&nbsp;All
                                              </a>
                                              <a href="dasboard.php?page=Register-Employe-Delete&fstatus=1" class="btn btn-outline-info">
                                                <i class="fa fa-user"></i>&nbsp;Active
                                              </a>
                                              <a href="dasboard.php?page=Register-Employe-Delete&fstatus=2" class="btn btn-outline-info">
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
                                            <th class="headTable">No</th>
                                            <th class="headTable">NIK</th>
                                            <th class="headTable">Nama Karyawan</th>
                                            <th class="headTable">Devisi</th>
                                            <th class="headTable">Tanggal Bergabung</th>
                                            <th class="headTable">Status</th>
                                            <th class="headTable">Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no = 1;
                                    foreach ($dataKaryawan as $row) 
                                    {
                                        if ($row['STATUS'] != 1) {
                                            $err ='alert alert-danger';
                                        }else{
                                            $err = 'alert alert-success';
                                        }

                                        if ($row['STATUS'] != 1) {
                                            $status = "<p class='btn btn-sm btn-danger'><i class='fa fa-times'></i> Nonctive</p>";
                                        }else{
                                            $status = "<p class='btn btn-sm btn-success'><i class='fa fa-check'></i> Active</p>";
                                        }

                                        echo "<tbody>";
                                            echo "<tr>";
                                                echo "<td class='bodyTable ".$err."'>".$no."</td>";
                                                echo "<td class='bodyTable ".$err."'>".$row['NIK']. "</td>";
                                                echo "<td class='bodyTable ".$err."'>".$row['FRISTNAME']. "</td>";
                                                echo "<td class='bodyTable ".$err."'>".$row['DEVISI']. "</td>";
                                                echo "<td class='bodyTable ".$err."'>".$row['TANGGAL_BAERGABUNG']. "</td>";
                                                if ($Manager == 1 || $Developer == 1) {
                                                    echo"<td class='bodyTable ".$err."'>"."<a href='dasboard.php?page=Data-Register-Employe&fid=".$row['ID']."'>".$status."</a>"."</td>";
                                                    echo "<td class='bodyTable ".$err."'>
                                                        <a class='btn btn-sm btn-danger' href=''>
                                                            <i class='fa fa-trash' aria-hidden='true'></i> Delete
                                                        </a>
                                                    </td>";
                                                }elseif ($Admin == 1) {
                                                    echo "<td class='bodyTable ".$err."'>
                                                    <a class='btn btn-danger' href='dasboard.php?page=Edit-Registrasi&fid=".$row['ID']."'><i class='fa fa-trash'></i> Delete</a>
                                                    </td>";
                                                }
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