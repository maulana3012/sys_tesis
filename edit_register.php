<?php
include_once "asset/_lib/config.php";

if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}

if (isset($_GET['fid'])) {
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
  header('Location: index.php');
}

if (isset($_POST['edit'])) {

  if (isset($_POST['chk_manager'])==1) {
    $chkManager = 1;
  }else{
    $chkManager =0;
  }

  if (isset($_POST['chk_admin'])==1) {
    $chkAdmin = 1;
  }else{
    $chkAdmin =0;
  }
  if (isset($_POST['chk_devloper'])==1) {
    $chkDevloper = 1;
  }else{
    $chkDevloper =0;
  }
  if (isset($_POST['chk_d_admin'])==1) {
    $chkDAdmin = 1;
  }else{
    $chkDAdmin =0;
  }
  if (isset($_POST['chk_reporting'])==1) {
    $chkReporting = 1;
  }else{
    $chkReporting =0;
  }

  if (isset($_POST['chk_read'])==1) {
    $chkRead = 1;
  }else{
    $chkRead =0;
  }

  if (isset($_POST['chk_project'])==1) {
    $chkProject = 1;
  }else{
    $chkProject =0;
  }

  $fid        = $_POST['fid'];
  $fmanager     = $chkManager;
  $fadmin       = $chkAdmin;
  $fdeveloper     = $chkDevloper;
  $fdataAdmin     = $chkDAdmin;
  $freport      = $chkReporting;
  $fread        = $chkRead;
  $fproject     = $chkProject;

  $edit = $user->edit_regist($fid, $fmanager, $fadmin, $fdeveloper, $fdataAdmin, $freport, $fread, $fproject);

  if ($edit) {
    header('Location: data_register.php');
  }else{
    echo "Tidak Berhasil";
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
                        else if(isset($_GET['joined']))
                        {
                             ?>
                             <div class="alert alert-info">
                                  <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='data_register.php'>login</a> here
                             </div>
                             <?php
                        }
                    ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Update User Management</h1>
                    <hr class="sidebar-divider">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Update User</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-container">
                                <form action="" method="post">
                                  <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="InputFristname">Frist Name</label>
                                          <input type="hidden" name="fid" value="<?php echo $dataid['ID']; ?>"/>
                                          <input type="text" class="form-control" id="InputFristname" aria-describedby="InputFristname" placeholder="Enter Frist Name" name="fFristname" value="<?php echo $dataid['FRISTNAME']; ?>" disabled>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="InputLastname">Last Name</label>
                                          <input type="text" class="form-control" id="InputLastname" aria-describedby="InputLastname" placeholder="Enter Last Name" name="fLastname" value="<?php echo $dataid['LASTNAME']; ?>" disabled>
                                      </div>
                                    </div>
                                  </div>        
                                  </div>

                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="InputEmail">Email</label>
                                      <input type="email" class="form-control" id="InputEmail" aria-describedby="InputEmail" placeholder="Enter Email" name="femail" value="<?php echo $dataid['EMAIL']; ?>" disabled>
                                  </div>
                                  </div>

                                  <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="InputPassword">Password</label>
                                          <input type="password" class="form-control" id="InputPassword" aria-describedby="InputPassword" placeholder="Enter Password" name="fpassword" value="<?php echo $dataid['PASSWORD']; ?>" disabled>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="InputConfirmPassword">Confirm Password</label>
                                          <input type="password" class="form-control" id="InputConfirmPassword" aria-describedby="InputConfirmPassword" placeholder="Enter Confirm Password" name="fconfirmpassword" value="<?php echo $dataid['CONFIRM_PASSWORD']; ?>" disabled>
                                      </div>
                                    </div>
                                  </div>        
                                  </div>
                                  <hr>
                                  <div class="col-md-12">
                                    <small><b>Select User Role's</b></small>
                                    <table class="table table-bordered table-responsive-md table-responsive-sm">
                                    <thead class="table-secondary">
                                      <tr>
                                        <th style="text-align: center;">User Manager</th>
                                        <th style="text-align: center;">Administrator</th>
                                        <th style="text-align: center;">Devloper</th>
                                        <th style="text-align: center;">Data Administrator</th>
                                        <th style="text-align: center;">Reporting</th>
                                        <th style="text-align: center;">Read only</th>
                                        <th style="text-align: center;">Project Creator</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td style="text-align: center;">
                                          <div class="checkbox">
                                        <input type="checkbox" value="1" name="chk_manager" <?php echo $check_a; ?> >
                                      </div>
                                        </td>
                                        <td style="text-align: center;">
                                          <div class="checkbox">
                                        <input type="checkbox" value="1" name="chk_admin" <?php echo $check_b; ?> >
                                      </div>
                                        </td>
                                        <td style="text-align: center;">
                                          <div class="checkbox">
                                        <input type="checkbox" value="1" name="chk_devloper" <?php echo $check_c; ?> >
                                      </div>
                                        </td>
                                        <td style="text-align: center;">
                                          <div class="checkbox">
                                        <input type="checkbox" value="1" name="chk_d_admin" <?php echo $check_d; ?> >
                                      </div>
                                        </td>
                                        <td style="text-align: center;">
                                          <div class="checkbox">
                                        <input type="checkbox" value="1" name="chk_reporting" <?php echo $check_e; ?> >
                                      </div>
                                        </td>
                                        <td style="text-align: center;">
                                          <div class="checkbox">
                                        <input type="checkbox" value="1" name="chk_read" <?php echo $check_f; ?> >
                                      </div>
                                        </td>
                                        <td style="text-align: center;">
                                          <div class="checkbox">
                                        <input type="checkbox" value="1" name="chk_project" <?php echo $check_g; ?> >
                                      </div>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <button type="submit" class="btn btn-sm btn-primary" name="edit">
                                             <i class="fa fa-floppy-o"></i>&nbsp;Update
                                  </button>

                                  <button type="submit" class="btn btn-sm btn-danger" name="btn-close">
                                             <i class="fa fa-trash-o"></i>&nbsp;Cancel
                                  </button>
                                  
                                  </div>

                                 </form>   
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