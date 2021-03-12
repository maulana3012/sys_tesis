<?php
include_once "asset/_lib/config.php";
if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}

$user_id = $_SESSION['user_session'];
$stmt = $db_con->prepare("SELECT * FROM tb_user WHERE ID=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
if ($userRow['STATUS'] == 1) {
  $Fristname = $userRow['FRISTNAME'];
  $Lastname  = $userRow['LASTNAME'];
  $Email     = $userRow['EMAIL'];
  $Image     = $userRow['IMAGE'];
  $Manager   = $userRow['USERMANAGER'];
  $Admin     = $userRow['ADMINISTRATOR'];
  $Developer = $userRow['DEVELOPER'];
  $Dadmin    = $userRow['DATA_ADMINISTRATOR'];
  $Report    = $userRow['REPORTING'];
  $Read      = $userRow['READONLY'];
  $Project   - $userRow['PROJECTCREATOR'];
}else{
  session_destroy();
  $user->logout();
  echo "<script>alert('Waktu Anda Telah Habis Broo!'); window.location ='index.php'></script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<link rel="stylesheet" type="text/css" href="asset/_font/fontawesome-free/css/all.min.css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="asset/_css/sb-admin-2.min.css">
<style type="text/css">
    .logo img{max-width:130px;padding:50px 0 0;width:100%}.bg-maul{background-color:#0e1a34;background-size:cover}
    .fMenu {font-size: 11px;}
    .headTable { font-size: 12px; text-align: center; }
    .bodyTable { font-size: 12px; text-align: center; }
    .box {
          position: relative;
          background: #ffffff;
          width: 100%;
        }

        .box-header {
          color: #444;
          display: block;
          padding: 10px;
          position: relative;
          border-bottom: 1px solid #f4f4f4;
          margin-bottom: 10px;
        }

        .box-tools {
          position: absolute;
          right: 10px;
          top: 5px;
        }

        .dropzone-wrapper {
          border: 2px dashed #91b0b3;
          color: #92b0b3;
          position: relative;
          height: 150px;
        }

        .dropzone-desc {
          position: absolute;
          margin: 0 auto;
          left: 0;
          right: 0;
          text-align: center;
          width: 40%;
          top: 50px;
          font-size: 16px;
        }

        .dropzone,
        .dropzone:focus {
          position: absolute;
          outline: none !important;
          width: 100%;
          height: 150px;
          cursor: pointer;
          opacity: 0;
        }

        .dropzone-wrapper:hover,
        .dropzone-wrapper.dragover {
          background: #ecf0f5;
        }

        .preview-zone {
          text-align: center;
        }

        .preview-zone .box {
          box-shadow: none;
          border-radius: 0;
          margin-bottom: 0;
        }
</style>
<style>
    .imgGallery img {
      padding: 8px;
      max-width: 90px;
    }    
  </style>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require_once "asset/_main/left.php"; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require_once "asset/_main/top.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
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
                    <?php require_once "asset/_main/page.php"; ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require_once "asset/_main/bottom.php"; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php?logout=true">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="asset/_jquery/jquery/jquery.min.js"></script>
<script src="asset/_js/bootstrap.bundle.min.js"></script>
<script src="asset/_jquery/jquery-easing/jquery.easing.min.js"></script>
<script src="asset/_js/sb-admin-2.min.js"></script>
<script src="asset/_js/chart.js/Chart.min.js"></script>
<script src="asset/_js/demo/chart-area-demo.js"></script>
<script>
    $(document).ready(function(){
    $(".preloader").fadeOut();
    })
</script>
<!-- <script>
        function readFile(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
         
            reader.onload = function(e) {
              var htmlPreview =
                '<img width="200" src="' + e.target.result + '" />' +
                '<p>' + input.files[0].name + '</p>';
              var wrapperZone = $(input).parent();
              var previewZone = $(input).parent().parent().find('.preview-zone');
              var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');
         
              wrapperZone.removeClass('dragover');
              previewZone.removeClass('hidden');
              boxZone.empty();
              boxZone.append(htmlPreview);
            };
         
            reader.readAsDataURL(input.files[0]);
          }
        }
         
        function reset(e) {
          e.wrap('<form>').closest('form').get(0).reset();
          e.unwrap();
        }
         
        $(".dropzone").change(function() {
          readFile(this);
        });
         
        $('.dropzone-wrapper').on('dragover', function(e) {
          e.preventDefault();
          e.stopPropagation();
          $(this).addClass('dragover');
        });
         
        $('.dropzone-wrapper').on('dragleave', function(e) {
          e.preventDefault();
          e.stopPropagation();
          $(this).removeClass('dragover');
        });
         
        $('.remove-preview').on('click', function() {
          var boxZone = $(this).parents('.preview-zone').find('.box-body');
          var previewZone = $(this).parents('.preview-zone');
          var dropzone = $(this).parents('.form-group').find('.dropzone');
          boxZone.empty();
          previewZone.addClass('hidden');
          reset(dropzone);
        });
    </script> -->
<script>
    $(function() {
    // Multiple images preview with JavaScript
    var multiImgPreview = function(input, imgPreviewPlaceholder) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

      $('#chooseFile').on('change', function() {
        multiImgPreview(this, 'div.imgGallery');
      });

      function reset(e) {
          e.wrap('<form>').closest('form').get(0).reset();
          e.unwrap();
        }
         
        $(".dropzone").change(function() {
          readFile(this);
        });
         
        $('.dropzone-wrapper').on('dragover', function(e) {
          e.preventDefault();
          e.stopPropagation();
          $(this).addClass('dragover');
        });
         
        $('.dropzone-wrapper').on('dragleave', function(e) {
          e.preventDefault();
          e.stopPropagation();
          $(this).removeClass('dragover');
        });
         
        $('.remove-preview').on('click', function() {
          var boxZone = $(this).parents('.preview-zone').find('.box-body');
          var previewZone = $(this).parents('.preview-zone');
          var dropzone = $(this).parents('.form-group').find('.dropzone');
          boxZone.empty();
          previewZone.addClass('hidden');
          reset(dropzone);
        });

    });    
  </script>
</html>