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
                    <h1 class="h3 mb-2 text-gray-800">Report Leave</h1>
                    <hr class="sidebar-divider">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Report Leave</h6>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <?php
                                    if ($Manager == 1 || $Admin == 1 || $Developer == 1) {
                                        echo "<a href='dasboard.php?page=Input-Registrasi' class='btn btn-sm btn-outline-primary'><i class='fa fa-download'></i>&nbsp;Ganerate Report</a>";
                                    }else{
                                        $error[] = "premision anda salah..!";
                                    }
                                ?>
                            </div>
                            <hr class="sidebar-divider">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <small>Search : </small><br>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                            <button class="btn btn-outline-success" type="button"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
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
                                    <div class="col-md-2">
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
                            <div class="table-responsive my-2">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="headTable">No</th>
                                            <th class="headTable">NIK</th>
                                            <th class="headTable">Nama Karyawan</th>
                                            <th class="headTable">Devisi</th>
                                            <th class="headTable">Tanggal Bergabung</th>
                                            <th class="headTable">Jumlah Cuti</th>
                                            <th class="headTable">Sisa Cuti</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="bodyTable"></td>
                                            <td class="bodyTable"></td>
                                            <td class="bodyTable"></td>
                                            <td class="bodyTable"></td>
                                            <td class="bodyTable"></td>
                                            <td class="bodyTable"></td>
                                            <td class="bodyTable"></td>
                                        </tr>    
                                    </tbody>
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