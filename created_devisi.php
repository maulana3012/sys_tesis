<?php
include_once "asset/_lib/config.php";

if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}
  $kode = $user->select_devisi();
  if (isset($_POST['submit'])) {
    $fkode   = trim($_POST['fkode']);
    $fdevisi = trim($_POST['fdevisi']);
    $fstatus = 2;

      if (empty($fdevisi)) {
        $error[] = "Provide Devisi !";
      }

      if (empty($error)) {
          $row = $user->show_devisi($fdevisi);
          if ($row['DEVISI'] == $fdevisi) {
            $error[] = "sorry Devisi already taken !";
          }else{
            if ($push = $user->created_devisi($fdevisi,$fkode)) {
              echo "<script>window.location.href='dasboard.php?page=Setting-Page'</script>";
            }

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
                    <h1 class="h3 mb-2 text-gray-800">Created Devisi</h1>
                    <hr class="sidebar-divider">
                    <!-- DataTales Example -->
                    <?php
                        if(isset($error))
                        {
                           foreach($error as $error)
                           {
                              ?>
                              <div class="alert alert-danger">
                                  <i class="fa fa-exclamation-triangle"></i> &nbsp; <?php echo $error; ?>
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
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Devisi PT Quadrant Synergi International</h6>
                        </div>
                        <div class="card-body">
                            
                            <div class="form-container">
                                <form action="" method="post">
                                    <div class="col-md-2">
                                      <div class="form-group">
                                          <label for="fdevisi">Kode Devisi</label>
                                          <input type="text" class="form-control" id="fdevisi" aria-describedby="fdevisi" placeholder="Enter Devisi" name="fkode" value="<?php echo $kode; ?>" >
                                      </div>  
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="fdevisi">Devisi</label>
                                          <input type="text" class="form-control" id="fdevisi" aria-describedby="fdevisi" placeholder="Enter Devisi" name="fdevisi" value="<?php if(isset($error)){echo $fdevisi;}?>" >
                                      </div>  
                                    </div>
                                    <hr class="sidebar-divider">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-sm btn-primary" name="submit">
                                             <i class="fa fa-floppy-o"></i>&nbsp;Simpan
                                        </button>
                                        <a href="dasboard.php?page=Setting-Page" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i>&nbsp;Cancel</a>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive my-5">
                              <div class="col-md-12">
                                <small>Data Devisi:</small>
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
                                    $no = 1;
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
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

</body>

</html>