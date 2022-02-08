<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo e(APP_NAME . ' | ' . $title); ?></title>
    <link rel="icon" type="png/x-image" href="<?php echo e(asset('imgs/icons/favicon.ico')); ?>"/>
    <!-- Custom fonts for this template-->
    <link href="<?php echo e(asset('vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo e(asset('css/sb-admin-2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/intro.js/minified/introjs.min.css"/>
    <?php echo $__env->yieldContent('css'); ?>
</head>

<body id="page-top">
    
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <?php if(session('account_type') == 'Student'): ?>
                
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <img src="<?php echo e(asset('img/undraw_profile.svg')); ?>" class="rounded-circle" height="50" alt="logo"/>
                    </div>
                    <div class="sidebar-brand-text mx-3"
                    data-intro="Hello <?php echo e(session('name')); ?>👋, welcome to the SCIT SEAT ALLOCATION" data-step="1" data-hint="Step 1">
                        <?php echo e(session('reg_no')); ?> <br/>
                        <?php echo e(session('st_no')); ?>

                    </div>
                </a>
            <?php else: ?> 
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <img src="<?php echo e(asset('imgs/icons/logo.png')); ?>" class="rounded-circle" height="50" alt="logo"/>
                    </div>
                    <div class="sidebar-brand-text mx-3"
                    data-intro="Hello <?php echo e(session('name')); ?>👋, welcome to the SCIT SEAT ALLOCATION" data-step="1" data-hint="Step 1">SCIT SEAT ALLOCATION</div>
                </a>

            <?php endif; ?>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo e(url('dashboard')); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard (<?php echo e(session('account_type')); ?>)</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <?php if(session('account_type') == 'Admin'): ?>
                
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo" data-intro="Add or vew all registered students" data-hint='Students' data-step="2">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Students</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">All Students:</h6>
                        <a class="collapse-item" href="<?php echo e(url('dashboard/students/list')); ?>">List All</a>
                        <a class="collapse-item" href="<?php echo e(url('dashboard/students/add')); ?>">Add New</a>
                    </div>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2"
                    aria-expanded="true" aria-controls="collapse2"
                    data-intro="Add or vew Examination room" data-hint='Rooms' data-step="3">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Rooms</span>
                </a>
                <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Examination Rooms:</h6>
                        <a class="collapse-item" href="<?php echo e(url('dashboard/rooms/list')); ?>">List All</a>
                        <a class="collapse-item" href="<?php echo e(url('dashboard/rooms/add')); ?>">Add New</a>
                    </div>
                </div>
            </li>

            <?php endif; ?>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4"
                    aria-expanded="true" aria-controls="collapse4" 
                    data-intro="Add or vew all Exams" data-hint='Exams' data-step="4">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Exams</span>
                </a>
                <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Exams?:</h6>
                        <a class="collapse-item" href="<?php echo e(url('dashboard/exams/list')); ?>">List All</a>
                        <?php if(session('account_type') == 'Admin'): ?>
                            <a class="collapse-item" href="<?php echo e(url('dashboard/exams/add')); ?>">Add New</a>
                        <?php endif; ?>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse5"
                    aria-expanded="true" aria-controls="collapse5" 
                    data-intro="Add or vew all Supervisors" data-hint='Supervisors' data-step="5">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Supervisors</span>
                </a>
                <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Exam Supervisors:</h6>
                        <a class="collapse-item" href="<?php echo e(url('dashboard/supervisors/list')); ?>">List All</a>
                        <?php if(session('account_type') == 'Admin'): ?>
                            <a class="collapse-item" href="<?php echo e(url('dashboard/supervisors/add')); ?>">Add New</a>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('dashboard/seats/allocation')); ?>"
                data-intro="Command the system to allocate seats to students" data-hint='Sitting Arrangement' data-step="6">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Sitting Arrangement</span></a>
            </li>

            <?php if(session('account_type') == 'Admin'): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(url('dashboard/users')); ?>"
                    data-intro="Add or vew users" data-hint='Users' data-step="7">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Users</span></a>
                </li>
            <?php endif; ?>
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

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" 
                                data-intro="Access settings, and logout when done with your operations" data-hint='User Settings' data-step="8">
                                
                                <img class="img-profile rounded-circle"
                                    src="<?php echo e(asset('img/undraw_profile.svg')); ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Hi, <?php echo e(session('name')); ?> <br/> (<?php echo e(session('account_type')); ?>)
                                </a>
                                <a class="dropdown-item" href="<?php echo e(url('dashboard/user/settings')); ?>">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(url('api/auth/user/logout')); ?>" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="jumbotron py-1 w-100">
                            <h4 class="mb-0 text-gray-800">
                                <?php echo e(session('account_type')); ?>           
                                <i class="fa fa-arrow-circle-right"></i>
                                Dashboard
                                <i class="fa fa-arrow-circle-right"></i>
                                <span class="text-primary"><?php echo e($page); ?></span> 
                            </h4>
                        </div>
                        
                        
                    </div>

                    <?php $__env->startSection('content'); ?>
                        
                    <?php echo $__env->yieldSection(); ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SCIT SEAT ALLOCATION <?php echo e(date('Y')); ?></span>
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
                    <a class="btn btn-primary" href="<?php echo e(url('api/auth/user/logout')); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo e(asset('vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo e(asset('js/sb-admin-2.min.js')); ?>"></script>

    <!-- Page level plugins -->
    <script src="<?php echo e(asset('vendor/chart.js/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/app-ajax.js')); ?>"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
    <script>
        if(document.getElementById('data-table'))
        {
            $('#data-table').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        }
    </script>
    <?php echo $__env->yieldContent('scripts'); ?>
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/61fbb8e7b9e4e21181bd452b/1fqvkkj27';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    <script src="https://unpkg.com/intro.js/minified/intro.min.js"></script>
</body>
</html> <?php /**PATH C:\xampp\htdocs\seatallocation\app\views/admin/base.blade.php ENDPATH**/ ?>