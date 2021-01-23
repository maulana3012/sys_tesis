<?php
include_once "asset/_lib/config.php";

if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}

if (isset($_POST['submit'])) {
    $fFristname         = trim($_POST['fFristname']);
    $fLastname          = trim($_POST['fLastname']);
    $fpassword          = trim($_POST['fpassword']);
    $fconfirmpassword   = trim($_POST['fconfirmpassword']);
    $femail             = trim($_POST['femail']);
    $fimage             = "undraw_profile.svg";
    $fdateCreated       = date('Y/m/d H:i:s');
    $fmanager           = trim($_POST['chk_manager']);
    $fadmin             = trim($_POST['chk_admin']);
    $fdeveloper         = trim($_POST['chk_devloper']);
    $fdataAdmin         = trim($_POST['chk_d_admin']);
    $freport            = trim($_POST['chk_reporting']);
    $fread              = trim($_POST['chk_read']);
    $fproject           = trim($_POST['chk_project']);
    $fstatus            = 2;

    if ($fFristname == "") {
        $error[] = "provide Frist Name !";
    }elseif ($fLastname == "") {
        $error[] = "provide Last Name !";
    }elseif ($femail == "") {
        $error[] = "provide Email !";
    }elseif (!filter_var($femail, FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Please enter a valid email address !';
    }elseif ($fpassword == "") {
        $error[] = "provide Password !";
    }elseif ($fconfirmpassword == "") {
        $error[] = "provide Confirm Password !";
    }elseif ($fpassword !== $fconfirmpassword) {
        $error[] = "Confirm Password is Not the Same as Password !";
    }else{
        try{
            $stmt = $db_con->prepare("SELECT FRISTNAME,LASTNAME,EMAIL FROM tb_user WHERE FRISTNAME=:FRISTNAME OR LASTNAME=:LASTNAME AND EMAIL=:EMAIL");
            $stmt->execute(array(':FRISTNAME'=>$fFristname, ':LASTNAME'=>$fLastname, ':EMAIL'=>$femail));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            if ($row['FRISTNAME']==$fFristname) {
                $error[] = "sorry Frist Name already taken !";  
            }elseif ($row['LASTNAME']==$fLastname) {
                $error[] = "sorry Last Name already taken !";
            }elseif ($row['EMAIL']==$femail) {
                $error[] = "sorry Email already taken !";
            }else{
                if ($user->register($fFristname, $fLastname, $fpassword, $fconfirmpassword, $femail, $fimage, $fdateCreated, $fmanager, $fadmin, $fdeveloper, $fdataAdmin, $freport, $fread, $fproject, $fstatus)) {
                    $user->redirect('data_register.php?joined');
                }
            }
        }
        catch(PDOException $e)
        {
        echo $e->getMessage();
        }
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
                    <h1 class="h3 mb-2 text-gray-800">Registrasi User Management</h1>
                    <hr class="sidebar-divider">
                    <?php
                        if(isset($error))
                        {
                           foreach($error as $error)
                           {
                              ?>
                              <div class="alert alert-danger">
                                  <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
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
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Registrasi User</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-container">
                                <form action="" method="post">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="InputFristname">Frist Name</label>
                                                    <input type="text" class="form-control" id="InputFristname" aria-describedby="InputFristname" placeholder="Enter Frist Name" name="fFristname" value="<?php if(isset($error)){echo $fFristname;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="InputLastname">Last Name</label>
                                                    <input type="text" class="form-control" id="InputLastname" aria-describedby="InputLastname" placeholder="Enter Last Name" name="fLastname" value="<?php if(isset($error)){echo $fLastname;}?>">
                                                </div>
                                            </div>
                                        </div>          
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="InputEmail">Email</label>
                                            <input type="email" class="form-control" id="InputEmail" aria-describedby="InputEmail" placeholder="Enter Email" name="femail" value="<?php if(isset($error)){echo $femail;}?>" >
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="InputPassword">Password</label>
                                                    <input type="password" class="form-control" id="InputPassword" aria-describedby="InputPassword" placeholder="Enter Password" name="fpassword">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="InputConfirmPassword">Confirm Password</label>
                                                    <input type="password" class="form-control" id="InputConfirmPassword" aria-describedby="InputConfirmPassword" placeholder="Enter Confirm Password" name="fconfirmpassword">
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
                                                  <input type="checkbox" value="1" name="chk_manager">
                                                </div>
                                              </td>
                                              <td style="text-align: center;">
                                                <div class="checkbox">
                                                  <input type="checkbox" value="1" name="chk_admin">
                                                </div>
                                              </td>
                                              <td style="text-align: center;">
                                                <div class="checkbox">
                                                  <input type="checkbox" value="1" name="chk_devloper">
                                                </div>
                                              </td>
                                              <td style="text-align: center;">
                                                <div class="checkbox">
                                                  <input type="checkbox" value="1" name="chk_d_admin">
                                                </div>
                                              </td>
                                              <td style="text-align: center;">
                                                <div class="checkbox">
                                                  <input type="checkbox" value="1" name="chk_reporting">
                                                </div>
                                              </td>
                                              <td style="text-align: center;">
                                                <div class="checkbox">
                                                  <input type="checkbox" value="1" name="chk_read">
                                                </div>
                                              </td>
                                              <td style="text-align: center;">
                                                <div class="checkbox">
                                                  <input type="checkbox" value="1" name="chk_project">
                                                </div>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <!-- <input type="submit" name="submit" class="btn btn-sm btn-primary" value="Submit"> -->

                                        <button type="submit" class="btn btn-sm btn-primary" name="submit">
                                             <i class="fa fa-floppy-o"></i>&nbsp;Simpan
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