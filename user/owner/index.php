<?php 
    include 'settings.php'; //include settings

    $name = $_SESSION['name'];
    $query = "SELECT doc_status FROM documents where (doc_responsibility='$name') AND (doc_status='Pending')";
    $result = mysqli_query($conn,$query);
    $row = mysqli_num_rows($result);

    mysqli_free_result($result);

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

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    


    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
</head>

<style type="text/css">

  .all{
    font-family: "Nunito", sans-serif;
  }

  .uia{
    background: #50C8B5;
    color: black;
  }

  .black{
      background: #6C6C6C;
      color: white;
  }

</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion uia" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text mx-3 uia">Role: <?php echo $_SESSION['role_name']?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt" style="color:black"></i>
                    <span style="color:black">Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading" style="color:black">
                Menu
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-table" style="color:black"></i>
                    <span style="color:black">View and Track Documents</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../../includes/logout.php">
                    <i class="fas fa-fw fa-table" style="color:black"></i>
                    <span style="color:black">Logout</span></a>
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
                <nav class="navbar navbar-expand navbar-light black topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <div>
                      Document Tracking System
                    </div>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto black">

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

                        <!-- Nav Item - Messages -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white-600 small"><?php echo $_SESSION['name']?></span>
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
                <div class="container-fluid" id="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 black">
                            <div>
                                <h6 class="m-0 font-weight-bold text-white float-left">View Documents</h6>
                                <!-- <form action="report.php">
                                   <button type='submit' class="btn btn-light float-right" id="generate">Generate Report</button> 
                                </form>  -->
                            </div>  
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Doc ID</th>
                                            <th>Doc Name</th>
                                            <th>Sender</th>
                                            <th>Responsibility</th>
                                            <th>Status</th>
                                            <th>Received</th>
                                            <th>Due Date</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Doc ID</th>
                                            <th>Doc Name</th>
                                            <th>Sender</th>
                                            <th>Responsibility</th>
                                            <th>Status</th>
                                            <th>Received</th>
                                            <th>Due Date</th>
                                            <th>View</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php 
                                            include "C:\\xampp\htdocs\DTS2\includes\connect.php";

                                            // SQL query to fetch information of registerd users and finds user match.
                                            $currentName = $_SESSION["name"];
                                            //$query = "SELECT * FROM documents WHERE doc_responsibility ='$currentName'";
                                            $query = "SELECT * FROM documents WHERE owner ='$currentName'";

                                            $result = mysqli_query($conn,$query); 
                                            
                                            while ($row = mysqli_fetch_array($result)) {

                                                $date = $row['doc_receive'];
                                                $formatted_date = strtotime($date);

                                                $date2 = $row['doc_due'];
                                                $formatted_date2 = strtotime($date2);
                                              
                                                echo "<tr>";
                                                echo "<form method='post' target='_blank' action='track.php'>";
                                                echo "<td name=doc_id>" . $row['id'] . "</td>";
                                                echo "<td name='doc_name'>" . $row['doc_name'] . "</td>";
                                                echo "<td name='doc_sender'>" . $row['doc_sender'] . "</td>";
                                                echo "<td>". $row['doc_responsibility'] ."</td>";
                                                echo "<td>". $row['doc_comment'] ."</td>";
                                                echo "<td>" . date("D\, d-M-Y", $formatted_date) . "</td>";
                                                echo "<td>" . date("D\, d-M-Y", $formatted_date2) . "</td>";
                                                //echo "<td><button type='submit' name='save_button' value='".$row['doc_due']."'>Download</button></td>";

                                                echo"<td><a href='\DTS\pdf\\".$row['pdfname']."' target='_blank' class='btn btn-primary'>View</a></td>";

                                                echo "</form>";
                                                echo "</tr>";
                                                
                                                echo"<div id='doc-".$row['id']."' class='modal fade' role='dialog'>
                                                        <div class='modal-dialog'>
                                                            <!-- Modal content-->
                                                            <div class='modal-content'>

                                                                <div class='modal-header'>    
                                                                    <h4 class='modal-title'>Update Document Detail</h4>
                                                                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                                </div>

                                                                <div class='modal-body'>
                                                                    <form class='form-group' action='update_doc.php' method='post'>

                                                                        <div class='px-5 pb-3'>
                                                                            <Label>Document ID</label>
                                                                            <input readonly class='form-control' name='id' id='doc-".$row['id']."' value='".$row['id']."'>
                                                                        </div>

                                                                        <div class='px-5 pb-3'>
                                                                            <Label>Document Name</label>
                                                                            <input class='form-control' id='".$row['doc_name']."' value='".$row['doc_name']."' name='doc_name'>
                                                                        </div>

                                                                        <div class='px-5 pb-3'>
                                                                            <Label>Sender</label>
                                                                            <input name='sender' class='form-control' id='".$row['doc_sender']."' value='".$row['doc_sender']."'>
                                                                        </div>

                                                                        <div class='px-5 pb-3'>
                                                                            <Label>Responsibility</label>";
                                                                             
                                                                                include "C:\\xampp\htdocs\DTS2\includes\connect.php";

                                                                                // SQL query to fetch information of registerd users and finds user match.
                                                                                $query2 = "SELECT * FROM users WHERE (role_name != 'admin' || 'Admin')";
                                                                                $result2 = mysqli_query($conn,$query2);

                                                                                

                                                                                

                                                                                if($currentName === $row['doc_responsibility'])
                                                                                {
                                                                                    echo"<select class='form-control' name='responsibility' id='responsibility'>";


                                                                                }
                                                                                else
                                                                                {
                                                                                    echo"<select disabled class='form-control' name='responsibility' id='responsibility'>";
                                                                                }
                                                                                

                                                                                while ($row2 = mysqli_fetch_array($result2)) 
                                                                                {   

                                                                                    echo "<option value='".$row2['name']."'>" .$row2['name'].": ".$row2['role_name']."</option>"; 

                                                                                    $query3 = "SELECT `doc_responsibility` FROM `documents` WHERE `id` ='".$row['id']."'";

                                                                                    if($query3){
                                                                                        $result3 = mysqli_query($conn,$query3);
                                                                                        $row3 = mysqli_fetch_array($result3); 
                                                                                        
                                                                                    }
                                                                                    else{
                                                                                        echo "<option>Failed</option>";
                                                                                    }

                                                                                    $query4 = "SELECT `role_name` FROM `users` WHERE `name` ='".$row3['doc_responsibility']."'";

                                                                                    if($query4){
                                                                                        $result4 = mysqli_query($conn,$query4);
                                                                                        $row4 = mysqli_fetch_array($result4); 
                                                                                        
                                                                                    }
                                                                                    else{
                                                                                        echo "<option>q4 Failed</option>";
                                                                                    }

                                                                                    $role_name = $row4['role_name'];
                                                                                }
                                                                                echo "<option selected value='".$row3['doc_responsibility']."'>".$row3['doc_responsibility'].": ".$role_name."</option>";
                                                                                //echo "<option selected value='".$row3['doc_responsibility']."'>" .$row3['doc_responsibility']. "</option>";
                                                                                echo"</select>";   
                                                                        echo"</div>

                                                                        <input name='responsibility2' type='hidden' value='".$row['doc_responsibility']."'>

                                                                        <div class='px-5 pb-3'>
                                                                            <label for='kulliyah'>Kulliyah</label>
                                                                            <select  name='kulliyah' class='form-control'>
                                                                                <option value='".$row['doc_kulliyah']."'>".$row['doc_kulliyah']."</option>
                                                                                <option value='kict'>KICT</option>
                                                                                <option value='kos'>KOS</option>
                                                                                <option value='kaed'>KAED</option>
                                                                                <option value='koe'>KOE</option>
                                                                                <option value='econs'>ECONS</option>
                                                                                <option value='klm'>KLM</option>
                                                                                <option value='others'>Others</option>
                                                                                <option value='noniium'>Non IIUM</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class='px-5 pb-3'>
                                                                            <Label>Document Description</label>
                                                                            <input name='description' class='form-control' value='".$row['doc_description']."'>
                                                                        </div>

                                                                        <div class='px-5 pb-3'>
                                                                            <Label>Receive On</label>
                                                                            <input name='date_receive' type='datetime-local' class='form-control' value=
                                                                            '".substr_replace($row['doc_receive'], 'T', 10).substr($row['doc_receive'],11)."'>
                                                                        </div>

                                                                        <div class='px-5 pb-3'>
                                                                            <Label>Due Date</label>
                                                                            <input name='due_date' type='datetime-local' class='form-control' value=
                                                                            '".substr_replace($row['doc_due'], 'T', 10).substr($row['doc_due'],11)."'>
                                                                        </div>

                                                                        <div class='px-5 pb-3'>
                                                                            <Label>Document Location</label>
                                                                            <input name='location' class='form-control' value='".$row['doc_location']."'>
                                                                        </div>

                                                                        <div class='px-5 pb-3'>
                                                                            <label for='doc_attention'>Attention</label>
                                                                            <select class='form-control' id='attention' name='attention'>
                                                                                <option selected>".$row['doc_attention']."</option>
                                                                                <option>Urgent</option>
                                                                                <option>Not Urgent</option>
                                                                                <option>Others</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class='px-5 pb-3'>
                                                                            <label for='doc_characteristic'>Document Characteristic</label>
                                                                            <select class='form-control' id='characteristic' name='characteristic'>
                                                                              <option selected>".$row['doc_characteristic']."</option>
                                                                              <option>Softcopy</option>
                                                                              <option>Hardcopy</option>
                                                                              <option>Others</option>
                                                                            </select>                                       
                                                                        </div>

                                                                        <div class='px-5 pb-3'>
                                                                            <Label>Document Status</label>
                                                                            <input name='status' class='form-control' value='".$row['doc_status']."'>
                                                                        </div>

                                                                        <div class='px-5 pb-3'>
                                                                            <Label>Comment</label>
                                                                            <input name='comment' class='form-control' value='".$row['doc_comment']."'>
                                                                        </div>

                                                                        <div class='modal-footer'>
                                                                            <button type='submit' class='btn btn-default' name='update_btn'>Update</button>
                                                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>";
                                            }
                                            mysqli_close($conn); // Closing Connection  
                                        ?>
                                    </tbody>
                                </table>    
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Document Tracking System 2021</span>
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
                    <a class="btn btn-primary" href="../../includes/logout.php">Logout</a>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    

    <script type="text/javascript">


        //var tbl = $('#dataTable');
        $(document).ready(function() {
            

        // Setup - add a text input to each footer cell
            $('#dataTable thead tr').clone(true).appendTo( '#dataTable thead' );

            $('#dataTable thead tr:eq(0) th').each( function (i) {

                if(i>6)
                {

                    $(this).html( '' );
                }

                else
                {
                    var title = $(this).text();
                    
                    $(this).html( '<input class="form-control" type="text" placeholder="Search '+title+'" />' );
                    
                    
         
                    $( 'input', this ).on( 'keyup change', function () 
                    {
                        if ( table.column(i).search() !== this.value )
                        {
                            table
                                .column(i)
                                .search( this.value )
                                .draw();
                        }
                    });
                }
            });   

            $('#dataTable').DataTable().destroy();
     
            var table = $('#dataTable').DataTable( {
                initComplete: function () { 
                    this.api().columns().every( function (i) {

                        if(i<=6){
                            var column = this;
                            var select = $('<select><option value=""></option></select>')
                                .appendTo( $(column.footer()).empty() )
                                .on( 'change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );
             
                                    column
                                        .search( val ? '^'+val+'$' : '', true, false )
                                        .draw();
                                } )
                            
                                column.data().unique().sort().each( function ( d, j ) 
                                {
                                    select.append( '<option value="'+d+'">'+d+'</option>' )
                                } );
                        }
                    } );
                }
            } );

            $('#dataTable').DataTable().destroy();

            $('#dataTable').DataTable({
                language.emptyTable: 'No documents',
                dom: 'lBfrtip',
                buttons: [
                    {
                        extend: 'pdf',
                        exportOptions:{
                            columns: [ 0, 1, 2, 3, 4 ]
                        }
                        /*customize : function(doc){
                            var colCount = new Array();
                            $(tbl).find('tbody tr:first-child td').each(function(){
                                if($(this).attr('colspan')){
                                    for(var i=1;i<=$(this).attr('colspan');$i++){
                                        colCount.push('*');
                                    }
                                }else{ colCount.push('*'); }
                            });
                            doc.content[1].table.widths = colCount;
                        }*/
                    },

                    {
                        extend: 'csv',
                        exportOptions:{
                            columns: [ 0, 1, 2, 3, 4 ]
                        }
                    },

                    {
                        extend: 'colvis',
                        exportOptions:{
                            columns: [ 0, 1, 2, 3, 4 ]
                        }
                    },

                    {
                        extend: 'print',
                        className: 'btn-primary',
                        exportOptions: {
                            rows: ':visible',
                            columns: [ 0, 1, 2, 3, 4, 5, 6 ],
                            columns: ':visible'
                        },
                    }
                ],
                responsive: true,
            })
        });
        
    </script>
</body>

</html>