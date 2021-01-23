<?php
include_once "asset/_lib/config.php";

if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}

if (isset($_GET['fid'])) {
  $fid = $_GET['fid'];
  $row = $user->show_karyawan_nik($fid);
  $data = $row['NIK'];
}

if (isset($_POST['submit'])) {
	$fKid			= $row['NIK'];
	$fimage_name 	= $_FILES['uploadfile']['name'];
	$fimage_size	= $_FILES['uploadfile']['size'];
	$fimage_tmp		= $_FILES['uploadfile']['tmp_name'];
	$valid_extensions = array('jpeg', 'jpg', 'png');
	$imgExt = strtolower(pathinfo($fimage_name,PATHINFO_EXTENSION));
	$upload_dir_rgb = 'asset/_upload/RGB/';
    $fnameKaryawan = $row['FRISTNAME'];
    $userRgb = $fnameKaryawan.".".$imgExt;
    $localFile = $upload_dir_rgb.$userRgb;

	if (empty($fimage_name)) {
		$error[] = "Please Select Image File.";
	}elseif ($fimage_size > 5000000) {
		$error[] = "Sorry, your file is too large.";
	}elseif (!in_array($imgExt, $valid_extensions)) {
		$error[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	}else{
		$upload = move_uploaded_file($fimage_tmp,$upload_dir_rgb.$userRgb);
		if (!empty($upload)) {
			$up = $user->upload_register_employee($fKid,$userRgb,$localFile,$fimage_size);
			if (isset($up)) {
				echo shell_exec("py D:/SISTEM/SISTEM/sys_tesis/connect.py $data");
			}else{
				echo "Error";
			}
			// echo shell_exec("python sys_tesis/connect.py '".$fKid."'");
			// echo "<script>window.location.href='test.php'</script>";
			// exit();

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
                            <h6 class="m-0 font-weight-bold text-primary">Upload Images</h6>
                        </div>
                        <div class="card-body">
                        	<div class="form-container">
                        		<form action="" method="post" enctype="multipart/form-data">
                        			<div class="container">
								      <div class="row">
								        <div class="col-md-12">
								          <div class="form-group">
								            <label class="control-label">Upload File</label>
								            <div class="preview-zone hidden">
								              <div class="box box-solid">
								                <div class="box-header with-border">
								                  <div><b>Preview</b></div>
								                  <div class="box-tools pull-right">
								                    <button type="button" class="btn btn-danger btn-xs remove-preview">
								                      <i class="fa fa-times"></i> Reset The Field
								                    </button>
								                  </div>
								                </div>
								                <div class="box-body"></div>
								              </div>
								            </div>
								            <div class="dropzone-wrapper">
								              <div class="dropzone-desc">
								                <i class="fa fa-download"></i>
								                <p>Choose an image file or drag it here.</p>
								              </div>
								              <input type="file" name="uploadfile" class="dropzone">
								            </div>
								          </div>
								        </div>
								      </div>
								 
								      <div class="row">
								        <div class="col-md-12">
								          <button type="submit" name="submit" class="btn btn-primary pull-right">Upload</button>
								        </div>
								      </div>
								    </div>
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