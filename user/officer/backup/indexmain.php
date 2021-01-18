<?php 
    session_start();
    include "C:\\xampp\htdocs\DTS2\includes\connect.php";
    //echo $_SESSION['name'];
    $name = $_SESSION['name'];

    $query = "SELECT doc_status FROM documents where (doc_responsibility='$name') AND (doc_status='Pending')";
    $result = mysqli_query($conn,$query);
    $row = mysqli_num_rows($result);

    mysqli_free_result($result);
    //echo $row;

    $today_date = date("Y-m-d");

    $query2 = "SELECT `date`,`message` FROM announcement";
    $result2 = mysqli_query($conn,$query2);
    $count = 0;
    
    while ($row2 = mysqli_fetch_array($result2)) {
        $announcement_date = date("Y-m-d",strtotime($row2['date']));
        if($today_date === $announcement_date){
            $count++;
            //echo $today_date ." ". $announcement_date;
            //echo $row2['message'];
        }

        //$date = $row['date'];
        //$formatted_date = strtotime($date);

        //echo "<td id='".$row['login']."'>". $row['login'] ."</td>";
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

    <title>Document Tracking System</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text mx-3">Role: <?php echo $_SESSION['role_name']?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="announcement.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>View Announcement</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="view_docs.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>View and Track Documents</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../../includes/logout.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"><?php echo $row?></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="view_docs.php">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"><?php echo date("D\, d-M-Y") ?></div>
                                        <span class="font-weight-bold">You have <?php echo $row?> pending documents </span>
                                    </div>
                                </a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter"><?php echo $count ?></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Announcement for today
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="font-weight-bold">
                                    <?php
                                        $today_date1 = date("Y-m-d");

                                        $query3 = "SELECT `date`,`message` FROM announcement";
                                        $result3 = mysqli_query($conn,$query3);
                                        
                                        while ($row3 = mysqli_fetch_array($result3)) {
                                            $announcement_date1 = date("Y-m-d",strtotime($row3['date']));
                                            if($today_date1 === $announcement_date1){
                                                echo $today_date1;
                                                echo"<div class='text-truncate'>".$row3['message']."</div><br>";
                                            }

                                            //$date = $row['date'];
                                            //$formatted_date = strtotime($date);

                                            //echo "<td id='".$row['login']."'>". $row['login'] ."</td>";
                                        }
                                    ?>
                                    </div>
                                </a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['name']?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <form action='add_doc.php' method="post" enctype="multipart/form-data">
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Collapsable Card Example -->
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Accordion -->
                                    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                        role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                        <h6 class="font-weight-bold text-primary px-4">Add Document:</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    
                                    <div class="collapse show" id="collapseCardExample">

                                        <div class="form-group px-5 pt-2">
                                            <label for="doc_name">Document Name</label>
                                            <input type="" class="form-control" id="doc_name" name="doc_name" autocomplete="off">
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="sender">Sender</label>
                                            <input type="" class="form-control" id="sender" name="sender">
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="responsibility">Responsibility</label>

                                            <?php 
                                                include "C:\\xampp\htdocs\DTS2\includes\connect.php";

                                                // SQL query to fetch information of registerd users and finds user match.
                                                $query = "SELECT * FROM users WHERE (role_name != 'admin' || 'Admin') AND (role_name != 'owner' || 'Owner')";
                                                $result = mysqli_query($conn,$query);
                                                
                                                echo"<select class='form-control' name='responsibility'>";
                                                while ($row = mysqli_fetch_array($result)) 
                                                {
                                                    echo"<option value='".$row['name']."'>" .$row['name'].": ".$row['role_name']."</option>";  
                                                }
                                                echo"</select>";
                                            
                                                mysqli_close($conn); // Closing Connection
                                            ?>  
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="recipient-name">Kuliyyah:</label>
                                            <select  name="kuliyyah" class="form-control">
                                                <option value="kict">KICT</option>
                                                <option value="kos">KOS</option>
                                                <option value="kaed">KAED</option>
                                                <option value="koe">KOE</option>
                                                <option value="econs">ECONS</option>
                                                <option value="klm">KLM</option>
                                                <option value="others">Others</option>
                                                <option value="others">Non IIUM</option>
                                            </select>
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="doc_desc">Document Description</label>
                                            <input type="" class="form-control" id="doc_desc" name="doc_desc">
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="receive_date">Receive on</label>
                                            <input type="datetime-local" step="1" class="form-control" id="receive_date" name="receive_date">
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="due_date">Due date</label>
                                            <input type="datetime-local" step="1"  class="form-control" id="due_date" name="due_date">
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="doc_location">Document Location</label>
                                            <input type="" class="form-control" name="doc_location">
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="doc_attention">Attention</label>
                                            <select class="form-control" id="doc_attention" name="doc_attention">
                                              <option>Urgent</option>
                                              <option>Not Urgent</option>
                                              <option>Others</option>
                                            </select>
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="doc_characteristic">Document Characteristic</label>
                                            <select class="form-control" id="doc_characteristic" name="doc_characteristic">
                                              <option>Softcopy</option>
                                              <option>Hardcopy</option>
                                              <option>Others</option>
                                            </select>                                       
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="doc_status">Document Status</label>
                                            <input type="" class="form-control" id="doc_status" name="doc_status">
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <label for="doc_comment">Comment</label>
                                            <input type="" class="form-control" id="doc_comment" name="doc_comment">
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <input type="file" id="file" name="file">
                                        </div>

                                        <div class="form-group px-5 pt-2">
                                            <button type="submit" class="btn btn-primary" value="Submit" name="doc_submit">Submit</button>
                                        </div>
                                    </div>     
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.container-fluid -->
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>