<?php
require_once 'asset/_lib/config.php';

if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}

$dataCheck = $user->data_check();
$num_of_rows_check = count($dataCheck);

if (isset($_POST['CHECKED'])) {
    if ($num_of_rows_check>0) {
        foreach($dataCheck as $row){

            if($check = !preg_match("/^[a-zA-Z ]*$/", $row['POLICY_HOLDER_NAME'] && $row['LIFE_ASSURED'] && $row['AGENT_NAME'] && $row['EMAIL_POLICY_HOLDER_NAME'])){
                  if ($check) {
                      $error="Maaf..! Data Mengandung Special Karater";
                      $del = "`,'/";
                      $dataUpdateCheck = [
                          date('Y-m-d H:i:s'),
                          $U_POLICY_HOLDER_NAME = str_replace(str_split($del)," ", $row['POLICY_HOLDER_NAME']),
                          $U_LIFE_ASSURED = str_replace(str_split($del)," ", $row['LIFE_ASSURED']),
                          $U_AGENT_NAME = str_replace(str_split($del)," ", $row['AGENT_NAME']),
                          $U_EMAIL_POLICY_HOLDER_NAME = str_replace(str_split($del)," ", $row['EMAIL_POLICY_HOLDER_NAME']),
                          $row['POLICY_NUMBER']
                      ];

                      $InsertCreated = $user->update_check($dataUpdateCheck);

                      if ($InsertCreated) {
                         $success ="SPESIAL KARAKTER BERHASIL DI UPDATE,POLICY_NUMBER=".$row['POLICY_NUMBER'].",POLICY_HOLDER_NAME=".$U_POLICY_HOLDER_NAME."";

                         echo "<script>window.location.href='dasboard.php?page=DATA-CHECKED'</script>";
                         // header("Refresh:0; url=page2.php");
                      }
                  }
            }

        }
    }
}

if (isset($_POST['PARSED'])) {
  $STATUS_FLAG = 'CHECKED';
  $resultParsing = $user->data_check_status($STATUS_FLAG);
  $num_of_rows_parsing = count($resultParsing);
  $countParsing = 0;
  $noParsing=0;
  $max_add = 18;

  foreach($resultParsing as $dataParsing){
    $InputParsed = [
                $UID         = randomString(15),
                $CLIENT_TYPE = trim($dataParsing['CLIENT_TYPE']),
                $POLICY_HOLDER_NAME = trim(parsing($dataParsing['POLICY_HOLDER_NAME'],$max_add,1)),
                $POLICY_HOLDER_NAME_ROW_2 = trim(parsing($dataParsing['POLICY_HOLDER_NAME'],$max_add,2)),
                $LIFE_ASSURED = trim(parsing($dataParsing['LIFE_ASSURED'],$max_add,1)),
                $LIFE_ASSURED_ROW_2 = trim(parsing($dataParsing['LIFE_ASSURED'],$max_add,2)),
                $POLICY_HOLDER_DATE_OF_BIRTH = trim($dataParsing['POLICY_HOLDER_DATE_OF_BIRTH']),
                $POLICY_HOLDER_DATE_OF_BIRTH_LIFE_ASSURED = trim($dataParsing['POLICY_HOLDER_DATE_OF_BIRTH_LIFE_ASSURED']),
                $POLICY_NUMBER = trim($dataParsing['POLICY_NUMBER']),
                $CURRENCY_1 = trim(converrtCurr($dataParsing['CURRENCY_1'])),
                $SUM_ASSURED = trim(convertNominal($dataParsing['SUM_ASSURED'])),
                $CURRENCY_2 = trim(converrtCurr($dataParsing['CURRENCY_2'])),
                $PREMIUM_AMOUNT = trim(convertNominal($dataParsing['PREMIUM_AMOUNT'])),
                $CODE_FREQUENCY = trim(convertfreq($dataParsing['PAYMENT_FREQUENCY'])),
                $PAYMENT_FREQUENCY = trim($dataParsing['PAYMENT_FREQUENCY']),
                $CODE_PAYMENT_METHOD = trim($dataParsing['CODE_PAYMENT_METHOD']),
                $PAYMENT_METHOD = trim(convertmetode($dataParsing['CODE_PAYMENT_METHOD'])),
                $AGENT_NAME = trim($dataParsing['AGENT_NAME']),
                $POLICY_HOLDER_PHONE_NUMBER = trim($dataParsing['POLICY_HOLDER_PHONE_NUMBER']),
                $EMAIL_POLICY_HOLDER_NAME = trim($dataParsing['EMAIL_POLICY_HOLDER_NAME']),
                $COMPONENT_DESCRIPTION = trim($dataParsing['COMPONENT_DESCRIPTION']),
                $CODE_COMPONENT_DESCRIPTION = trim(convertcode($dataParsing['COMPONENT_DESCRIPTION'])),
                $ISSUED_DATE = trim($dataParsing['ISSUED_DATE']),
                $CYCLE_DATE = trim($dataParsing['CYCLE_DATE']),
                $PARSED_AT = trim(date('Y-m-d H:i:s')),
                $CREATED_AT = trim($dataParsing['CREATED_DATE']),
                $EXPIRED_DATE = trim(date('Y-m-d H:i:s',strtotime("+35 days"))),
                $EXPIRED_STATUS = 'FALSE',
                $STATUS_FLAG = 'PARSED'

    ];



                // var_dump($InputParsed);

                $Insertparsing     = $user->parsed($InputParsed);
                

                if ($Insertparsing) {
                         // $success ="SPESIAL KARAKTER BERHASIL DI UPDATE,POLICY_NUMBER=".$row['POLICY_NUMBER'].",POLICY_HOLDER_NAME=".$U_POLICY_HOLDER_NAME."";
                         $InsertDataPurl    = $user->data_purl($InputParsed);
                         echo "<script>window.location.href='dasboard.php?page=DATA-PARSING'</script>";
                         // header("Refresh:0; url=page2.php");
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
                    <h1 class="h3 mb-2 text-gray-800">Datafeed Export Check</h1>
                    <hr class="sidebar-divider">
          
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
                                            <th class="headTable">STATUS FLAG</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no = 1;
                                        
                                    foreach ($dataCheck as $row)
                                    {
                                        if ($row['STATUS_FLAG'] != CHECKED) {
                                            $btn = 'alert alert-danger';
                                        }else{
                                            $btn = 'alert alert-success';
                                        }
                                        echo "<tbody>";
                                            echo "<tr>";
                                                echo "<td class='bodyTable ".$btn."'>".$no."</td>";
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
                                    <div class="float-right">
                                        <?php
                                        if ($row['STATUS_FLAG']==CHECKED) {
                                          echo "
                                          <input type='submit' class='btn-sm btn-success' name='PARSED' value='PARSING DATA'>";
                                        }elseif ($row['STATUS_FLAG']==CREATED) {
                                          echo "
                                          <input type='submit' class='btn-sm btn-primary' name='CHECKED' value='CHECKED ALL'>";
                                        }
                                        ?>
                                    </div>
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