<?php
require_once 'asset/_lib/config.php';
require_once 'phpseclib0.3.0/Net/SFTP.php';


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

set_include_path(get_include_path() . PATH_SEPARATOR . './phpseclib0.3.0');

// Include("Net/SFTP.php");

if (isset($_POST['Cari'])) {
   $Project        = trim($_POST['Project']);
   $row = $user->data_project($Project);
   $count = count($row);

   $hostname = $row['hostname'];
   $username = $row['username'];
   $password = $row['password'];
   $port     = $row['port'];
}

if (isset($_POST['test'])) {
    $hostname = $_POST['txthostname'];
    $username = $_POST['txtusername'];
    $password = $_POST['txtpassword'];
    $port     = $_POST['txtport'];

    $fileimport = $_POST['fileimport'];
    $fileexport = $_POST['fileexport'];

    $sftp = new Net_SFTP($hostname);
    $noSFTP = 0;
    
    if (!$sftp->login($username, $password))
    {
        $error ="SFTP TIDAK TERKONEKSI";
        $pesan   = "<div class='alert alert-danger'><i class='glyphicon glyphicon-warning-sign'></i>".$error."</div>";

    }else{
        $success ="SFTP TERKONEKSI";
        $pesan   = "<div class='alert alert-success'><i class='glyphicon glyphicon-warning-sign'></i>".$success."</div>";
    }
}

if (isset($_POST['Excute'])) {
    $hostname = $_POST['txthostname'];
    $username = $_POST['txtusername'];
    $password = $_POST['txtpassword'];
    $port     = $_POST['txtport'];
    $fileimport = $_POST['fileimport'];

    $sftp = new Net_SFTP($hostname);
    $noSFTP = 0;
    
    if (!$sftp->login($username, $password))
    {
        $sftplog = "SFTP TIDAK TERKONEKSI";
    }else{
        $sftplog = "SFTP TERKONEKSI";

        $path = "DATA-FEED/";
        $filePath = $path.$fileimport;
        $localFile = "file/";
        $localPath = $localFile.$fileimport;

        if(!$sftp->get($filePath,$localPath))
        {
            $error = "".$fileimport." Tidak Terdownload";
            // addLog($file_name_log_SFTP, $error, "[ERROR]");
        }else{
            $success = "".$fileimport." Terdownload";
            addLog($file_name_log_SFTP, $success, "[OK]");

            $heandel = csvToArray($localPath);
            $num_of_rows = count($heandel);
            $countCreated = 0;
            $noCreated = 0;

            if ($num_of_rows>0) {
                foreach ($heandel as $line){
                    $dataCreated = [
                        $CLIENT_TYPE = set($line[17]),
                        $POLICY_HOLDER_NAME = set($line[3]),
                        $LIFE_ASSURED = set($line[8]),
                        $POLICY_HOLDER_DATE_OF_BIRTH = set($line[5]),
                        $POLICY_HOLDER_DATE_OF_BIRTH_LIFE_ASSURED = set($line[6]),
                        $POLICY_NUMBER = set($line[7]),
                        $CURRENCY_1 = set($line[9]),
                        $SUM_ASSURED = set($line[10]),
                        $CURRENCY_2 = set($line[9]),
                        $PREMIUM_AMOUNT = set($line[11]),
                        $PAYMENT_FREQUENCY = set($line[12]),
                        $CODE_PAYMENT_METHOD = set($line[13]),
                        $AGENT_NAME = set($line[14]),
                        $POLICY_HOLDER_PHONE_NUMBER = set($line[15]),
                        $EMAIL_POLICY_HOLDER_NAME = set($line[16]),
                        $COMPONENT_DESCRIPTION = set($line[4]),
                        $CYCLE_DATE = set($line[0]),
                        $ISSUED_DATE = set($line[2]),
                        $CREATED_DATE = date('Y-m-d H:i:s'),
                        $STATUS_FLAG='CREATED'
                    ];

                    // var_dump($dataCreated);
                    $InsertCreated = $user->created($dataCreated);

                    if ($InsertCreated) {
                        echo "<script>window.location.href='dasboard.php?page=DATA-CHECKED'</script>";
                    }
                    
                }
            }
        }
    }
    
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Run API</title>
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
                    <h1 class="h3 mb-2 text-gray-800">Excute API</h1>
                    <hr class="sidebar-divider">
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Excute API</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-container">
                                <div class="col-lg-12">
                                    <form action="" method="post">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="InputFristname">Project</label>
                                                <select class="form-control" id="Project" name="Project">
                                                    <option>-Pilih-</option>
                                                    <?php
                                                        $query = "SELECT id, name FROM tb_sftp";
                                                        $data = $db_con->prepare($query);
                                                        $data->execute();

                                                        While($row=$data->fetch(PDO::FETCH_ASSOC)){
                                                            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                                <input type="submit" name="Cari" class="btn btn-primary my-1" value="Cari">
                                            </div>          
                                        </div>
                                        <hr>
                                    </form>
                                    <?php
                                    if ($count>0 || $success) {
                                        
                                        echo "
                                            <div class='form-group'>
                                                ".$pesan."
                                                <form action='' method='post'>
                                                    <div class='col-lg-12'>
                                                        <div class='row'>
                                                            <div class='col-lg-2'>
                                                                <label for='InputFristname'>Hostname</label>
                                                                <input type='text' name='txthostname' class='form-control' value='".$hostname."'>
                                                            </div>
                                                            <div class='col-lg-2'>
                                                                <label for='InputFristname'>Username</label>
                                                                <input type='text' name='txtusername' class='form-control' value='".$username."'>
                                                            </div>
                                                            <div class='col-lg-3'>
                                                                <label for='InputFristname'>Password</label>
                                                                <input type='password' name='txtpassword' class='form-control' value='".$password."'>
                                                            </div>
                                                            <div class='col-lg-2'>
                                                                <label for='InputFristname'>Port</label>
                                                                <input type='text' name='txtport' class='form-control' value='".$port."'>
                                                            </div>
                                                            <div class='col-lg-2'>
                                                                <label for='InputFristname'>Test Connection</label>
                                                                <input type='submit' name='test' class='form-control btn btn-sm btn-primary' value='Test Connection'>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        ";

                                        if ($success) {
                                            echo "
                                            <div class='form-container'>
                                                <form action='' method='post'>
                                                    <div class='col-lg-12'>
                                                        <div class='row'>
                                                            <div class='col-lg-3'>
                                                                <label for='InputFristname'>Filename Import</label>
                                                                <input type='hidden' name='txthostname'value='".$hostname."'>
                                                                <input type='hidden' name='txtusername' value='".$username."'>
                                                                <input type='hidden' name='txtpassword' value='".$password."'>
                                                                <input type='hidden' name='txtport'value='".$port."'>
                                                                <input type='text' name='fileimport' class='form-control' value=''>
                                                            </div>
                                                            <div class='col-lg-2'>
                                                                <label for='InputFristname'>Excute:</label>
                                                                <input type='submit' name='Excute' class='form-control btn btn-sm btn-primary' value='Excute'>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            ";
                                        }

                                    }else{
                                            echo "
                                            <div class='form-group'>
                                            ".$pesan."
                                            </div>
                                            ";
                                    }

                                    ?>
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