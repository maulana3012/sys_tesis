<?php
require_once 'asset/_lib/config.php';

if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}

$dataParsed = $user->data_parsed();

if (isset($_POST['CONVERTED'])) {
  $STATUS_FLAG = 'PARSED';
  $selectconverted = $user->data_parsed_status($STATUS_FLAG);
  $num_of_rows_convert = count($selectconverted);
  
  foreach ($selectconverted as $row) {
      $UID              = $row['UID'];
      $encode           = base64_encode($UID);
      $decode           = base64_decode($encode);
      $LANDING_PAGE     = $link_eov."".$encode;
      $GENERATED_AT     = trim(date('Y-m-d H:i:s'));
      $POLICY_NUMBER    = trim($row['POLICY_NUMBER']);

      $updateconverted = $user->update_parsed($LANDING_PAGE,$GENERATED_AT,$POLICY_NUMBER);

      if ($updateconverted) {
        $updatepurl = $user->update_purl($LANDING_PAGE,$GENERATED_AT,$POLICY_NUMBER);
        echo "<script>window.location.href='dasboard.php?page=DATA-PARSING'</script>";
      }


  }
}

if (isset($_POST['EXPORT'])) {
    $FileExport         = $_POST['fileexport'];
    $STATUS_FLAG        = "CONVERTED";
    $query = "SELECT UID,CLIENT_TYPE,POLICY_HOLDER_NAME,POLICY_HOLDER_NAME_ROW_2,LIFE_ASSURED,LIFE_ASSURED_ROW_2,POLICY_HOLDER_DATE_OF_BIRTH,POLICY_HOLDER_DATE_OF_BIRTH_LIFE_ASSURED,POLICY_NUMBER,CURRENCY_1,SUM_ASSURED,CURRENCY_2,PREMIUM_AMOUNT,CODE_FREQUENCY,PAYMENT_FREQUENCY,CODE_PAYMENT_METHOD,PAYMENT_METHOD,AGENT_NAME,POLICY_HOLDER_PHONE_NUMBER,EMAIL_POLICY_HOLDER_NAME,COMPONENT_DESCRIPTION,CODE_COMPONENT_DESCRIPTION,LANDING_PAGE,ISSUED_DATE,CYCLE_DATE,PARSED_AT,GENERATED_AT,STATUS_FLAG,CREATED_AT FROM tb_data_zurich WHERE STATUS_FLAG = '$STATUS_FLAG'";
    $sqlEx = $db_con->prepare($query);
    $sqlEx->execute();
    // $data = $sqlEx->fetchAll();    
    // $num_of_rows_export = count($data);

    if (empty($FileExport)) {
        $error = "Maff Data Tidak Boleh Kosong...!";
    }else{
        $delimiter          = "|";
        $filelocation       = "file/";
        $file_export        =  $filelocation . $FileExport;
        $csv_fields = array();
  
        $csv_fields[] = 'UID';
        $csv_fields[] = 'CLIENT_TYPE';
        $csv_fields[] = 'POLICY_HOLDER_NAME';
        $csv_fields[] = 'POLICY_HOLDER_NAME_ROW_2';
        $csv_fields[] = 'LIFE_ASSURED';
        $csv_fields[] = 'LIFE_ASSURED_ROW_2';
        $csv_fields[] = 'POLICY_HOLDER_DATE_OF_BIRTH';
        $csv_fields[] = 'POLICY_HOLDER_DATE_OF_BIRTH_LIFE_ASSURED';
        $csv_fields[] = 'POLICY_NUMBER';
        $csv_fields[] = 'CODE_FREQUENCY';
        $csv_fields[] = 'PAYMENT_FREQUENCY';
        $csv_fields[] = 'CODE_PAYMENT_METHOD';
        $csv_fields[] = 'PAYMENT_METHOD';
        $csv_fields[] = 'AGENT_NAME';
        $csv_fields[] = 'POLICY_HOLDER_PHONE_NUMBER';
        $csv_fields[] = 'EMAIL_POLICY_HOLDER_NAME';
        $csv_fields[] = 'CODE_COMPONENT_DESCRIPTION';
        $csv_fields[] = 'COMPONENT_DESCRIPTION';
        $csv_fields[] = 'LANDING_PAGE';
        $csv_fields[] = 'CREATED_DATE';

        $in  = fputcsv($data, $csv_fields,$delimiter);
        $ins = file_put_contents($file_export, implode("|", $csv_fields).PHP_EOL , FILE_APPEND | LOCK_EX);

        while ($row = $sqlEx->fetch(PDO::FETCH_ASSOC)) {
              $lineData = array(
              $row['UID'], 
              $row['CLIENT_TYPE'], 
              $row['POLICY_HOLDER_NAME'], 
              $row['POLICY_HOLDER_NAME_ROW_2'], 
              $row['LIFE_ASSURED'], 
              $row['LIFE_ASSURED_ROW_2'], 
              $row['POLICY_HOLDER_DATE_OF_BIRTH'], 
              $row['POLICY_HOLDER_DATE_OF_BIRTH_LIFE_ASSURED'], 
              $row['POLICY_NUMBER'], 
              $row['CODE_FREQUENCY'], 
              $row['PAYMENT_FREQUENCY'], 
              $row['CODE_PAYMENT_METHOD'], 
              $row['PAYMENT_METHOD'], 
              $row['AGENT_NAME'], 
              $row['POLICY_HOLDER_PHONE_NUMBER'], 
              $row['EMAIL_POLICY_HOLDER_NAME'], 
              $row['CODE_COMPONENT_DESCRIPTION'], 
              $row['COMPONENT_DESCRIPTION'], 
              $row['LANDING_PAGE'], 
              $row['CREATED_AT']);

              // var_dump($lineData);
              $out  = fputcsv($data, $lineData, $delimiter);
              $outs = file_put_contents($file_export, implode ("|", $lineData).PHP_EOL , FILE_APPEND | LOCK_EX);

              if (!empty($outs)) {
                  $POLICY_NUMBER = $row['POLICY_NUMBER'];
                  $user->update_export($POLICY_NUMBER);
                  $success = "'".$FileExport."' berhasil di Export..!";

                  if ($success) {
                    $user->purl_status($POLICY_NUMBER);
                    echo "<script>window.location.href='dasboard.php?page=DATA-PARSING'</script>";
                  }

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
                    <h1 class="h3 mb-2 text-gray-800">Datafeed Export PARSING</h1>
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
                            <h6 class="m-0 font-weight-bold text-primary">Datafeed Export Check</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="headTable">NO</th>
                                            <th class="headTable">UID</th>
                                            <th class="headTable">CYCLE DATE</th>
                                            <th class="headTable">CLIENT TYPE</th>
                                            <th class="headTable">POLICY HOLDER NAME</th>
                                            <th class="headTable">LIFE ASSURED</th>
                                            <th class="headTable">POLICY HOLDER DOB</th>
                                            <th class="headTable">LIFE ASSURED DOB</th>
                                            <th class="headTable">POLICY NUMBER</th>
                                            <th class="headTable">SUM ASSURED</th>
                                            <th class="headTable">PREMIU AMOUNT</th>
                                            <th class="headTable">POLICY HOLDER PHONE NUMBER</th>
                                            <th class="headTable">EMAIL POLICY HOLDER NAME</th>
                                            <th class="headTable">LANDING PAGE</th>
                                            <th class="headTable">STATUS FLAG</th>
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
                                                echo "<td class='bodyTable ".$btn."'>".$row['UID']. "</td>";
                                                echo "<td class='bodyTable ".$btn."'>".$row['CYCLE_DATE']. "</td>";
                                                echo "<td class='bodyTable ".$btn."'>".$row['CLIENT_TYPE']. "</td>";
                                                echo "<td class='bodyTable ".$btn."'>".$row['POLICY_HOLDER_NAME']. "</td>";
                                                echo "<td class='bodyTable ".$btn."'>".$row['LIFE_ASSURED']. "</td>";
                                                echo "<td class='bodyTable ".$btn."'>".$row['POLICY_HOLDER_DATE_OF_BIRTH']. "</td>";
                                                echo "<td class='bodyTable ".$btn."'>".$row['POLICY_HOLDER_DATE_OF_BIRTH_LIFE_ASSURED']. "</td>";
                                                echo "<td class='bodyTable ".$btn."'>".$row['POLICY_NUMBER']. "</td>";
                                                echo "<td class='bodyTable ".$btn."'>".$row['CURRENCY_1']. ".".$row['SUM_ASSURED']. "</td>";
                                                echo "<td class='bodyTable ".$btn."'>".$row['CURRENCY_2']. ".".$row['PREMIUM_AMOUNT']. "</td>";
                                                echo "<td class='bodyTable ".$btn."'>".$row['POLICY_HOLDER_PHONE_NUMBER']. "</td>";
                                                echo "<td class='bodyTable ".$btn."'>".$row['EMAIL_POLICY_HOLDER_NAME']. "</td>";
                                                echo "<td class='bodyTable ".$btn."'>".$row['LANDING_PAGE']. "</td>";
                                                echo "<td class='bodyTable ".$btn."'>".$row['STATUS_FLAG']. "</td>";
                                            echo"</tr>";    
                                        echo"</tbody>";
                                        $no++;
                                    }
                                    ?>
                                </table>
                            </div>
                            <hr>
                            <form action="" method="post">
                                <div class="col-lg-12">
                                    <?php
                                        if ($row['STATUS_FLAG']==PARSED) {
                                            echo "<div class='float-right'>
                                                <input type='submit' class='btn-sm btn-primary' name='CONVERTED' value='GANERATED'>
                                            </div>";
                                        }elseif ($row['STATUS_FLAG']==CONVERTED) {
                                            echo "
                                                <div class='row'>
                                                    <div class='col-lg-3'>
                                                        <label for='Export'>Filename Export</label>
                                                        <input type='text' name='fileexport' class='form-control' value=''>
                                                    </div>
                                                    <div class='col-lg-2'>
                                                        <label for='InputFristname'><small>Export:</small></label>
                                                        <input type='submit' class='form-control btn-sm btn-primary' name='EXPORT' value='EXPORT DATA'>
                                                    </div>
                                                </div>
                                            ";
                                        }else{
                                          echo "<div class='float-right'>
                                                <a href ='dasboard.php?page=DATA-PURL' class='btn-sm btn-primary'>View Purl Data</a>
                                            </div>";
                                        }
                                    ?>
                                </div>
                            </form>
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