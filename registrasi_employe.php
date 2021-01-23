<?php
include_once "asset/_lib/config.php";
if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}

if (isset($_POST['fsimpan'])) {
    $fnik           = trim($_POST['fnik']);
    $fFristname     = trim($_POST['fFristname']);
    $fLastname      = trim($_POST['fLastname']);
    $ftmpLahir      = trim($_POST['ftmpLahir']);
    $ftgllahir      = trim($_POST['ftgllahir']);
    $fjeniskelamin  = trim($_POST['fjeniskelamin']);
    $fagama         = trim($_POST['fagama']);
    $falamat        = trim($_POST['falamat']);
    $fnoHp          = trim($_POST['fnoHp']);
    $femail         = trim($_POST['femail']);
    $fdevisi        = trim($_POST['fdevisi']);
    $fjabatan       = trim($_POST['fjabatan']);
    $ftgljoin       = trim($_POST['ftgljoin']);
    $ftglCrated     = date('Y-m-d H:i:s');

    if (empty($fnik)) {
        $error[] = "provide Nik !";
    }elseif (empty($fFristname)) {
        $error[] = "provide Frist Name !";
    }elseif (empty($fLastname)) {
        $error[] = "provide Last Name !";
    }elseif (empty($ftmpLahir)) {
        $error[] = "provide Tempat Lahir !";
    }elseif (empty($ftgllahir)) {
        $error[] = "provide Tanggal Lahir !";
    }elseif (empty($fjeniskelamin)) {
        $error[] = "provide Jenis Kelamin !";
    }elseif (empty($fagama)) {
        $error[] = "provide Agama !";
    }elseif (empty($falamat)) {
        $error[] = "provide Alamat !";
    }elseif (empty($fnoHp)) {
        $error[] = "provide Nomor Handphone !";
    }elseif (empty($femail)) {
        $error[] = "provide Email !";
    }elseif (empty($fdevisi)) {
        $error[] = "provide Devisi !";
    }elseif (empty($fjabatan)) {
        $error[] = "provide Jabatan";
    }elseif (empty($ftgljoin)) {
        $error[] = "provide Tanggal Join !";
    }else{
        try{
            $stmt = $db_con->prepare("SELECT NIK,EMAIL FROM tb_karyawan WHERE NIK=:NIK OR EMAIL=:EMAIL");
            $stmt->execute(array(':NIK'=>$fnik, ':EMAIL'=>$femail));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            if ($row['NIK'] == $fnik) {
                $error[] = "sorry NIK already taken !";
            }elseif ($row['EMAIL'] == $femail) {
                $error[] = "sorry Email already taken !";
            }else{
                $pushReg = $user->insert_register_employee($fnik,$fFristname,$fLastname,$ftmpLahir,$ftgllahir,$fjeniskelamin,$fagama,$falamat,$fnoHp,$femail,$fdevisi,$fjabatan,$ftgljoin,$ftglCrated);

                if (!empty($pushReg)) {
                    echo "<script>window.location.href='dasboard.php?page=Register-Employe-Upload&fid=".$fnik."'</script>";
                }
            }

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title></title>
</head>
<body id="page-top">
	<div id="wrapper">
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				<div class="container-fluid">
					<h1 class="h3 mb-2 text-gray-800">Register Data Employe</h1>
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
					<div class="card shadow mb-4">
						<div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Registrasi Employe</h6>
                        </div>
                        <div class="card-body">
                        	<div class="form-container">
                        		<form action="" method="post">
                        			<div class="col-md-12">
                        				<div class="row">
                                            <div class="col-md-9">
                                                
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="tampiltanggal">Tanggal</label>
                                                    <input type="text" class="form-control" id="tampiltanggal" aria-describedby="tampiltanggal" value="<?php echo date('F j, Y, g:i a')?>" disabled="">
                                                </div>
                                            </div>
                                        </div> 
                        			</div>
                        			<hr class="sidebar-divider">
                        			<div class="col-md-3">
                                        <div class="form-group">
                                            <label for="fnik">NIK</label>
                                            <input type="text" class="form-control" id="fnik" aria-describedby="fnik" placeholder="Enter NIK" name="fnik" value="<?php if(isset($error)){echo $error;}?>">
                                        </div>
                        			</div>
                        			<div class="col-md-12">
                        				<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fFristname">Nama Depan</label>
                                                    <input type="text" class="form-control" id="fFristname" aria-describedby="fFristname" placeholder="Enter Frist Name" name="fFristname" value="<?php if(isset($error)){echo $fFristname;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fLastname">Nama Belakang</label>
                                                    <input type="text" class="form-control" id="fLastname" aria-describedby="fLastname" placeholder="Enter Last Name" name="fLastname" value="<?php if(isset($error)){echo $fLastname;}?>">
                                                </div>
                                            </div>
                                        </div> 
                        			</div>
                        			<div class="col-md-12">
                        				<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="ftmpLahir">Tempat Lahir</label>
                                                    <input type="text" class="form-control" id="ftmpLahir" aria-describedby="ftmpLahir" placeholder="Enter Tempat Lahir" name="ftmpLahir" value="<?php if(isset($error)){echo $ftmpLahir;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="ftgllahir">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" id="ftgllahir" aria-describedby="ftgllahir" placeholder="Enter Tanggal Lahir" name="ftgllahir" value="<?php if(isset($error)){echo $ftgllahir;}?>">
                                                </div>
                                            </div>
                                        </div> 
                        			</div>
                        			<div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fjeniskelamin">Jenis Kelamin</label>
                                            <select class="form-control" id="fjeniskelamin" name="fjeniskelamin">
                                            	<option>-Pilih-</option>
                                            	<option>Laki-Laki</option>
                                            	<option>Perempuan</option>
                                            </select>
                                        </div>
                        			</div>
                        			<div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fagama">Agama</label>
                                            <select class="form-control" id="fagama" name="fagama">
                                            	<option>-Pilih-</option>
                                            	<option>Islam</option>
                                            	<option>Kristen</option>
                                            	<option>Hinddu</option>
                                            	<option>Buddah</option>
                                            </select>
                                        </div>
                        			</div>
                        			<div class="col-md-12">
                                        <div class="form-group">
                                            <label for="falamat">Alamat</label>
                                            <textarea class="form-control" id="falamat" name="falamat" placeholder="Enter Alamat"></textarea>
                                        </div>
                        			</div>
                        			<div class="col-md-12">
                        				<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fnoHp">Nomor Handphone</label>
                                                    <input type="text" class="form-control" id="fnoHp" aria-describedby="fnoHp" placeholder="Enter Nomor Handphone" name="fnoHp" value="<?php if(isset($error)){echo $fnoHp;}?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="femail">Email</label>
                                                    <input type="text" class="form-control" id="femail" aria-describedby="femail" placeholder="Enter Email" name="femail" value="<?php if(isset($error)){echo $femail;}?>">
                                                </div>
                                            </div>
                                        </div> 
                        			</div>
                        			<div class="col-md-12">
                        				<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fdevisi">Devisi</label>
                                                    <select class="form-control" id="fdevisi" name="fdevisi">
		                                            	<option>-Pilih-</option>
		                                            	<?php
                                                            $query = "SELECT KODE, DEVISI FROM tb_devisi";
                                                            $data = $db_con->prepare($query);
                                                            $data->execute();

                                                        While($row=$data->fetch(PDO::FETCH_ASSOC)){
                                                            echo '<option value="'.$row['DEVISI'].'">'.$row['KODE'].' '.$row['DEVISI'].'</option>';
                                                        }
                                                        ?>
		                                            </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Jabatan">Jabatan</label>
                                                    <input type="text" class="form-control" id="fjabatan" aria-describedby="fjabatan" placeholder="Enter Jabatan" name="fjabatan" value="<?php if(isset($error)){echo $fjabatan;}?>">
                                                </div>
                                            </div>
                                        </div> 
                        			</div>
                        			<div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ftgljoin">Tanggal Bergabung</label>
                                            <input type="date" name="ftgljoin" class="form-control" id="ftgljoin" placeholder="Enter Tanggal Bergabung">
                                        </div>
                        			</div>
                        			<hr class="sidebar-divider">
                        			<input type="submit" name="fsimpan" class="btn btn-primary" value="Simpan">
                        			<input type="submit" name="fbatal" class="btn btn-danger" value="Batal">
                        			<!-- <a class="btn btn-primary" href="dasboard.php?page=Register-Employe-Upload">Simpan</a> -->
                        		</form>
                        	</div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>