        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?page=Dasboard">
                <div class="sidebar-brand-icon">
                    <div class="logo"><img src="asset/_images/qsi.png"></div>
                </div>
            </a>
            <br><br>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dasboard.php?page=Dasboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <?php
                    if ($Manager == 1 || $Admin == 1 || $Developer == 1 || $Dadmin == 1 || $Read == 1 || $Project == 1) {
                        echo "
                        <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseTwo' aria-expanded='true' aria-controls='collapseTwo'>
                            <i class='fas fa-fw fa-folder'></i><span>Employee Data</span></a>";
                    }else{
                        $error[] = "premision anda salah..!";
                    }
                ?>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Employee Data:</h6>
                        <?php
                            if ($Manager == 1 || $Developer == 1) {
                                echo "<a class='collapse-item fMenu' href='dasboard.php?page=Data-Register-Employe'>Employe Data</a>";
                                echo "<a class='collapse-item fMenu' href='dasboard.php?page=Register-Employe'>Register Employe Data</a>";
                                echo "<a class='collapse-item fMenu' href='dasboard.php?page=Register-Employe-Delete'>Delete Employe Data</a>";
                            }elseif ($Admin == 1) {
                                echo "<a class='collapse-item fMenu' href='dasboard.php?page=Register-Employe'>Register Employe Data</a>";
                            }elseif ($Dadmin == 1 || $Read == 1 || $Project == 1) {
                                echo "<a class='collapse-item fMenu' href='dasboard.php?page=Data-Register-Employe'>Employe Data</a>";
                            }else{
                                $error[] = "premision anda salah..!";
                            }
                        ?>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <?php
                    if ($Manager == 1 || $Admin == 1 || $Developer == 1 || $Dadmin == 1 || $Report == 1 || $Read == 1) {
                        echo "<a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseUtilities' aria-expanded='true' aria-controls='collapseUtilities'><i class='fas fa-fw fa-wrench'></i><span>Report Attendance</span></a>";
                    }
                ?>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Report Attendance:</h6>
                        <?php
                            if ($Manager == 1 || $Developer == 1) {
                                echo "<a class='collapse-item fMenu' href='dasboard.php?page=Data-Attendance'>Data Attendace</a>";
                                echo "<a class='collapse-item fMenu' href='dasboard.php?page=Data-Leave'>Data Leave</a>";
                                echo "<a class='collapse-item fMenu' href='dasboard.php?page=Report-Attendance'>Report Attendace</a>";
                                echo "<a class='collapse-item fMenu' href='dasboard.php?page=Report-Leave'>Report Leave</a>";
                            }elseif ($Admin == 1 || $Dadmin == 1 || $Report == 1 || $Read == 1) {
                                echo "<a class='collapse-item fMenu' href='dasboard.php?page=Report-Attendance'>Report Attendace</a>";
                                echo "<a class='collapse-item fMenu' href='dasboard.php?page=Report-Leave'>Report Leave</a>";
                            }
                        ?>
                    </div>
                </div>
            </li>
            

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Setting
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <?php
                    if ($Manager == 1 || $Admin == 1 || $Developer == 1 || $Dadmin == 1 || $Report == 1 || $Read == 1) {
                        echo "<a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapsePages' aria-expanded='true' aria-controls='collapsePages'><i class='fas fa-fw fa-folder'></i><span>User Management</span></a>";
                    }
                ?>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">User Management:</h6>
                        <?php
                            if ($Manager == 1 || $Developer == 1 || $Admin == 1) {
                                echo"<a class='collapse-item fMenu' href='dasboard.php?page=Registrasi'>User Management Data</a>";
                                echo"<a class='collapse-item fMenu' href='dasboard.php?page=Input-Registrasi'>Register User Management</a>";
                                echo"<a class='collapse-item fMenu' href='dasboard.php?page=Delete-Registrasi'>Delete User Management</a>";
                            }elseif ($Dadmin == 1 || $Report == 1 || $Read == 1) {
                                echo"<a class='collapse-item fMenu' href='dasboard.php?page=Registrasi'>User Management Data</a>";
                            }
                        ?>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Setting Absensi:</h6>
                        <?php
                            if ($Manager == 1 || $Developer == 1) {
                                echo"<a class='collapse-item fMenu' href='dasboard.php?page=Setting-Page'>Setting Absensi</a>";
                            }
                        ?>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card">
                <img src="asset/_images/qsi.png">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->

        </ul>