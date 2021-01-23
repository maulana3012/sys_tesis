<?php
include_once "asset/_lib/config.php";

if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}

if (isset($_GET['fid']) && !empty($_GET['fid'])) {
    $fid = $_GET['fid'];
    $dataid = $user->show_regist_by_id($fid);

  if ($dataid['USERMANAGER'] == 1) {
    $check_a = "checked";
  }else{
    $check_a = "";
  }

  if ($dataid['ADMINISTRATOR'] == 1) {
    $check_b = "checked";
  }else{
    $check_b = "";
  }

  if ($dataid['DEVELOPER'] == 1) {
    $check_c = "checked";
  }else{
    $check_c = "";
  }

  if ($dataid['DATA_ADMINISTRATOR'] == 1) {
    $check_d = "checked";
  }else{
    $check_d = "";
  }

  if ($dataid['REPORTING'] == 1) {
    $check_e = "checked";
  }else{
    $check_e = "";
  }

  if ($dataid['READONLY'] == 1) {
    $check_f = "checked";
  }else{
    $check_f = "";
  }

  if ($dataid['PROJECTCREATOR'] == 1) {
    $check_g = "checked";
  }else{
    $check_g = "";
  }

}else{
    echo "Data tidak ada";
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
                    <h1 class="h3 mb-2 text-gray-800">Profile User</h1>
                    <hr class="sidebar-divider">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Profile User</h6>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="text-center">
                                            <img src="<?php echo $dataid['IMAGE']; ?>" class="avatar img-circle img-thumbnail" alt="avatar">
                                        </div></hr><br>
                                    </div>
                                    <div class="col-md-9">
                                        <form class="form" action="##" method="post" id="registrationForm">
                                                  <div class="form-group">
                                                      
                                                      <div class="col-xs-6">
                                                          <label for="first_name">First name</label>
                                                          <input type="text" class="form-control" name="fFristname" id="first_name" value="<?php echo $dataid['FRISTNAME']; ?>">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      
                                                      <div class="col-xs-6">
                                                        <label for="last_name">Last name</label>
                                                          <input type="text" class="form-control" name="flastname" id="last_name" value="<?php echo $dataid['LASTNAME']; ?>">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      
                                                      <div class="col-xs-6">
                                                          <label for="email">Email</label>
                                                          <input type="email" class="form-control" name="femail" id="email" value="<?php echo $dataid['EMAIL']; ?>" >
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <div class="col-xs-6">
                                                          <label for="email">Access Level</label>
                                                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                            <thead>
                                                              <th class="headTable">User Manager</th>
                                                              <th class="headTable">Administrator</th>
                                                              <th class="headTable">Developer</th>
                                                              <th class="headTable">Data Administrator</th>
                                                              <th class="headTable">Reporting</th>
                                                              <th class="headTable">Read Only</th>
                                                              <th class="headTable">Project Creator</th>
                                                            </thead>
                                                            <tbody>
                                                              <tr>
                                                                <td style="text-align: center;">
                                                                  <div class="checkbox">
                                                                <input type="checkbox" value="1" name="chk_manager" <?php echo $check_a; ?> disabled>
                                                              </div>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                  <div class="checkbox">
                                                                <input type="checkbox" value="1" name="chk_admin" <?php echo $check_b; ?> disabled>
                                                              </div>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                  <div class="checkbox">
                                                                <input type="checkbox" value="1" name="chk_devloper" <?php echo $check_c; ?> disabled>
                                                              </div>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                  <div class="checkbox">
                                                                <input type="checkbox" value="1" name="chk_d_admin" <?php echo $check_d; ?> disabled>
                                                              </div>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                  <div class="checkbox">
                                                                <input type="checkbox" value="1" name="chk_reporting" <?php echo $check_e; ?> disabled>
                                                              </div>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                  <div class="checkbox">
                                                                <input type="checkbox" value="1" name="chk_read" <?php echo $check_f; ?> disabled>
                                                              </div>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                  <div class="checkbox">
                                                                <input type="checkbox" value="1" name="chk_project" <?php echo $check_g; ?> disabled>
                                                              </div>
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                       <div class="col-xs-12">
                                                            <br>
                                                            <a href="?page=Dasboard" class="btn btn-sm btn-danger">Kemabli</a>
                                                            <!-- <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                                            <button class="btn btn-lg btn-warning" type="submit"><i class="glyphicon glyphicon-repeat"></i> reset</button> -->
                                                        </div>
                                                  </div>
                                            </form>
                                    </div>
                                </div>
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