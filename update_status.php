<?php
include_once "asset/_lib/config.php";

if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}

if (isset($_GET['fid'])) {
  $fid = $_GET['fid'];
  $status = $user->show_regist_by_id($fid);

  if ($status['STATUS'] == 1) {
    $dataStatus = "<h1>Active</h1>";
  }else{
    $dataStatus = "<h1>Nonactive</h1>";
  }

}else{
  header('Location: index.php');
}

if (isset($_POST['submit'])) {
  $fid    = $_GET['fid'];
  $femail   = $_POST['femail'];
  $fpassword  = $_POST['fpassword'];
  $fstatus  = 1;
  
  if ($femail == $status['EMAIL'] && $fpassword == password_verify($fpassword, $status['PASSWORD'])) 
  {
    if ($updateStatus = $user->status_regist($fid,$fstatus)) {
      $user->redirect('dasboard.php');
    }else{
      $error[] = "Gagal Update Status....!";
    }
  }else{
    $error[] = "Username Tidak Terdaftar...!";
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
                    <h1 class="h3 mb-2 text-gray-800">Update Permission User Management</h1>
                    <hr class="sidebar-divider">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Update Permission User</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-container">
                                <form action="" method="post">
                                    <div class="col-lg-12">
                                        <div style="text-align: center;">
                                          <?php echo $dataStatus; ?>
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="col-md-12">
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="InputEmail">Email</label>
                                              <input type="email" class="form-control" id="InputEmail" aria-describedby="InputEmail" placeholder="Enter Email" name="femail">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="InputPassword">Password</label>
                                              <input type="password" class="form-control" id="InputPassword" aria-describedby="InputPassword" placeholder="Enter Password" name="fpassword">
                                          </div>
                                        </div>
                                      </div>        
                                      </div>
                                      <hr>
                                      <button type="submit" class="btn btn-sm btn-primary" name="submit">
                                                <i class="fa fa-floppy-o"></i>&nbsp;Update
                                    </button>

                                    <button type="submit" class="btn btn-sm btn-danger" name="btn-close">
                                                <i class="fa fa-trash-o"></i>&nbsp;Cancel
                                    </button>
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