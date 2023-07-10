<!DOCTYPE html>
<html lang="en">

<head>
    <style>
         body, html {
            background-color: cream !important;
        }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>
    
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    
    <link href="https:////cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('build/assets/sb-admin-2.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('build/assets/app-bbd6a014.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('users.profile', Auth::user())}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{Auth::user()->name}}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('admin.index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Jobs control
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapsejobs"
                    aria-expanded="true" aria-controls="collapsejobs">
                    <i class="fas fa-fw fa-search"></i>
                    <span>Jobs</span>
                </a>
                <div id="collapsejobs" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('jobs.index')}}">View</a>
                        <a class="collapse-item" href="{{route('jobs.create')}}">Create</a>
                        
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Applicants Control
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseUsers"
                    aria-expanded="true" aria-controls="collapseUsers">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Applicants</span>
                </a>
                <div id="collapseUsers" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('users.index')}}">View</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Applications Control
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseapplications"
                    aria-expanded="true" aria-controls="collapseapplications">
                    <i class="fab fa-wpforms"></i>
                    <span>Applications</span>
                </a>
                <div id="collapseapplications" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('applications.index')}}">View</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Authorizations
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapsenotifications"
                    aria-expanded="true" aria-controls="collapsenotifications">
                    <i class="fas fa-fw fa-bell"></i>
                    <span>Notifications</span>
                </a>
                <div id="collapsenotifications" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('notifications.index')}}">View</a>
                        <a class="collapse-item" href="{{route('notifications.create')}}">Create</a>
                    </div>
                </div>
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapsefees"
                    aria-expanded="true" aria-controls="collapsefees">
                    <i class="fas fa-fw fa-rupee-sign"></i>
                    <span>Fees</span>
                </a>
                <div id="collapsefees" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('fees.index')}}">View</a>
                        <a class="collapse-item" href="{{route('fees.create')}}">Create</a>
                    </div>
                </div>
            </li>

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
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

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
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60"
                                            alt="">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60"
                                            alt="">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="" id="userDropdown" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('storage/images/'.Auth::user()->profile_image)}}" alt="Image unavailable">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('users.profile', Auth::user())}}">
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
                                <form method="post" onsubmit="return confirm('Are you sure you want to logout?')"
                                    action="{{route('logout')}}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </li>
                        
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div    >
                        @yield('content')

                    </div>


                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

            </div>
            <!-- Footer -->

            <footer class="py-3 bg-dark mt-auto">
                <div>
                    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
                </div>
            </footer>
            <!-- End of Footer -->

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
</body>
<script
  src="https://code.jquery.com/jquery-3.7.0.min.js"
  integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
  crossorigin="anonymous">
</script>

<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        function fetchAll(url){
            $('#adminApplications').DataTable({
                destroy : true,
                processing : true,
                serverSide : true,
                ajax : url,
                columns :  [
                    {data : 'id', name:'id'},
                    {data : 'user_name', name:'user_name'},
                    {data : 'job_title', name : 'job_title'},
                    {data : 'father_name', name:'father_name'},
                    {data : 'mother_name', name:'mother_name'},
                    {data : 'phone', name:'phone'},
                    {data : 'email', name:'email'},
                    {data : 'gender', name:'gender'},
                    {data : 'category', name:'category'},
                    {data : 'educational_details', name:'educational_details'},
                    {data : 'dob', name:'dob'},
                    {data: 'payment_status', name: 'payment_status'},
                    {data : 'profile_image', name : 'profile_image'}
                ],
            });
        }
        
        function fetchCompleted(url){
            $('#adminApplications').DataTable({
                destroy : true,
                processing : true,
                serverSide : true,
                ajax : url,
                columns :  [
                    {data : 'id', name:'id'},
                    {data : 'user_name', name:'user_name'},
                    {data : 'job_title', name : 'job_title'},
                    {data : 'father_name', name:'father_name'},
                    {data : 'mother_name', name:'mother_name'},
                    {data : 'phone', name:'phone'},
                    {data : 'email', name:'email'},
                    {data : 'gender', name:'gender'},
                    {data : 'category', name:'category'},
                    {data : 'educational_details', name:'educational_details'},
                    {data : 'dob', name:'dob'},
                    {data: 'payment_status', name: 'payment_status'},
                    {data : 'profile_image', name : 'profile_image'}
                ],
            });
        }

        var url = "{{ route('adminapplications', ":id") }}";
        url = url.replace(':id', 0);
        fetchAll(url);
        $('#completed').change(function(){
            if($(this).prop('checked')){
                var url2 = "{{ route('adminapplications', ":id") }}";
                url2 = url2.replace(':id', 1);
                fetchCompleted(url2);
            }else{
                var url3 = "{{ route('adminapplications', ":id") }}";
                url3 = url3.replace(':id', 0);
                fetchAll(url);
            }
        });
        
        $('#adminNotifications').DataTable({
            processing : true,
            serveSide : true,
            ajax : '{{ route('adminnotifications') }}',
            columns : [
                
                {data : 'id', name:'id'},
                {data : 'job.title', name:'job.title'},
                {data : 'title', name:'id'},
                {data : 'description', name:'description'},
                {data : 'action', name:'action'},
            ]
        });

        $('#adminFees').DataTable({
            processing : true,
            serveSide : true,
            ajax : '{{ route('adminfees') }}',
            columns : [
                {data : 'id', name:'id'},
                {data : 'job.title', name:'job.title'},
                {data : 'UC', name:'UC'},
                {data : 'OBC', name:'OBC'},
                {data : 'SC', name:'SC'},
                {data : 'ST', name:'ST'},
                {data : 'action', name:'action'},
            ]
        });

        $('#applicants').DataTable({
            processing : true,
            serveSide : true,
            ajax : '{{ route('applicants') }}',
            columns : [
                {data : 'id', name:'id'},
                {data : 'name', name:'name'},
                {data : 'username', name:'username'},
                {data : 'email', name:'email'},
                {data : 'gender', name:'gender'},
                {data : 'phone', name:'phone'},
                {data : 'dob', name:'dob'},
                {data : 'address', name:'address'},
                {data : 'profile_image', name:'profile_image'},
                {data : 'action', name:'action'},
            ]
        });
        var userid = $('#userid').data('id');
        var url4 = "{{ route('userapplications', ":userid") }}";
        url4 = url4.replace(':userid', userid);
        $('#userApplications').DataTable({
            
            processing : true,
            serveSide : true,
            ajax : url4,
            columns : [
                {data : 'id', name: 'id'},
                {data : 'job.title', name:'job.title'},
                {data : 'father_name', name:'father_name'},
                {data : 'mother_name', name:'mother_name'},
                {data : 'user.phone', name:'user.phone'},
                {data : 'user.email', name:'user.email'},
                {data : 'user.gender', name:'user.gender'},
                {data : 'category', name:'category'},
                {data : 'educational_details', name:'educational_details'},
                {data : 'user.dob', name:'user.dob'},
                {data : 'payment_status', name:'payment_status'},
                {data : 'profile_image', name:'profile_image'},
            ]
        });

        $('#jobs').DataTable({
            processing : true,
            serverSide : true,
            ajax : '{{ route('jobs') }}',
            columns : [ 
                {data : 'id', name : 'id'},
                {data : 'title', name : 'title'},
                {data : 'description', name : 'description'},
                {data : 'minimum_qualification', name : 'minimum_qualification'},
                {data : 'minimum_age', name : 'minimum_age'},
                {data : 'maximum_age', name : 'maximum_age'},
                {data : 'start_date', name : 'start_date'},
                {data : 'end_date', name : 'end_date'},
                {data : 'exam_date', name : 'exam_date'},
                {data : 'applications_count', name : 'applications_count', searchable : false},
                {data : 'created_at', name : 'created_at'},
                {data : 'updated_at', name : 'updated_at'},
                {data : 'action', name : 'action'},
            ]
        });

        var jobid = $('#jobid').data('id')
        var joburl = '{{route('jobapplications', ":id")}}';
        joburl = joburl.replace(':id', jobid);
        $('#jobapplications').DataTable({
            processing : true,
            serverSide : true,
            ajax : joburl,
            columns : [ 
                {data : 'id', name : 'id'},
                {data : 'user_name', name : 'user_name'},
                {data : 'father_name', name : 'father_name'},
                {data : 'mother_name', name : 'mother_name'},
                {data : 'phone', name : 'phone'},
                {data : 'email', name : 'email'},
                {data : 'gender', name : 'gender'},
                {data : 'category', name : 'category'},
                {data : 'educational_details', name : 'educational_details'},
                {data : 'dob', name : 'dob'},
                {data : 'payment_status', name : 'payment_status'},
                {data : 'profile_image', name : 'profile_image'},
            ]
        });
    });
</script>
</html>