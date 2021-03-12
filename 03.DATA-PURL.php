<?php
require_once 'asset/_lib/config.php';

if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}

$dataParsed = $user->select_purl();
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
                    <h1 class="h3 mb-2 text-gray-800">Datafeed Purl</h1>
                    <hr class="sidebar-divider">
                    <?php
                        if(isset($error))
                        {
                           
                              ?>
                              <div class="alert alert-danger">
                                  <i class="fa fa-exclamation-circle"></i> &nbsp; <?php echo $error; ?>
                              </div>
                              <?php
                        }elseif (isset($success)) {
                            ?>
                              <div class="alert alert-success">
                                  <i class="fa fa-exclamation-circle"></i> &nbsp; <?php echo $success; ?>
                              </div>
                              <?php
                        }
                    ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Datafeed Purl</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="headTable">NO</th>
                                            <th class="headTable">CYCLE DATE</th>
                                            <th class="headTable">POLICY NUMBER</th>
                                            <th class="headTable">UID</th>
                                            <th class="headTable">POLICY HOLDER NAME</th>
                                            <th class="headTable">LIFE ASSURED</th>
                                            <th class="headTable">LANDING PAGE</th>
                                            <th class="headTable">EXPIRED DATE</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no = 1;
                                    foreach ($dataParsed as $row)
                                    {
                                        if ($row['STATUS_FLAG']==EXPORT) {
                                          $btn = 'alert alert-primary';
                                        }elseif ($row['STATUS_FLAG']==CONVERTED) {
                                          $btn = 'alert alert-success';
                                        }else{
                                          $btn = 'alert alert-danger';
                                        }
                                        echo "<tbody>";
                                            echo "<tr>";
                                                echo "<td class='bodyTable ".$btn."'>".$no."</td>";
                                                echo "<td class='bodyTable ".$btn."'>".$row['CYCLE_DATE']. "</td>";
                                                echo "<td class='bodyTable ".$btn."'>".$row['POLICY_NUMBER']. "</td>";
                                                echo "<td class='bodyTable ".$btn."'>".$row['UID']. "</td>";
                                                echo "<td class='bodyTable ".$btn."'>".$row['POLICY_HOLDER_NAME']. "</td>";
                                                echo "<td class='bodyTable ".$btn."'>".$row['LIFE_ASSURED']. "</td>";
                                                echo "<td class='bodyTable ".$btn."'>".$row['LANDING_PAGE']. "</td>";
                                                echo "<td class='bodyTable ".$btn."'>".$row['EXPIRED_DATE']. "</td>";
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