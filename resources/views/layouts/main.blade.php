<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />

    <title>Fight Booking System</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png')}}">
    <!-- Pignose Calender -->
    <link href="{{ asset('plugins/pg-calendar/css/pignose.calendar.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/chartist/css/chartist.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


    {{-- <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script> --}}
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">

</head>
<style>
    table.dataTable thead .sorting, table.dataTable thead .sorting_asc, table.dataTable thead .sorting_asc_disabled, table.dataTable thead .sorting_desc, table.dataTable thead .sorting_desc_disabled{
        background: none !important;
    }
    .nk-sidebar {
        background-color: #ffffff; /* White background */
        color: #0a08088f; /* Black text color */
        width: 242px; /* Fixed width */
        position: fixed; /* Fixed position */
        height: 100%; /* Full height */
        overflow-y: hidden; /* Scrollable content */
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        transition: width 0.3s; /* Smooth transition for width changes */
    }

    .nk-sidebar:hover {
        width: 242px; /* Slightly expand on hover */
    }

    .nk-sidebar .nk-nav-scroll ul {
        list-style-type: none; /* Remove bullet points */
        padding: 0; /* Remove padding */
    }

    .nk-sidebar .nk-nav-scroll ul li {
        padding: 15px 20px; /* Padding for list items */
        transition: background-color 0.3s; /* Smooth transition for hover effect */
    }

    .nk-sidebar .nk-nav-scroll ul li a {
        color: #767878; /* Black link color */
        text-decoration: none; /* Remove underline */
        display: flex; /* Use flexbox for alignment */
        align-items: center; /* Center items vertically */
        font-weight: bold; /* Bold text for links */
        padding: 0px 15px; /* Adjust padding for spacing */
    }

    .nk-sidebar .nk-nav-scroll ul li a i {
        margin-right: 10px; /* Space between icon and text */
    }

    .nk-sidebar .nk-nav-scroll ul li a:hover {
        background-color: #f0f0f0; /* Light grey hover background color */
        color: #000000; /* Black hover text color */
    }
    .invalid-feedback {
        display: block;
        color: red;
    }
    .form-check-label {
        color: #767878 !important;
    }
    .error {
        color: red !important;
        font-size: 80% !important;
    }
    /* .odd{
        display: none !important;
    } */
</style>
<body>

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="{{ asset('images/logo-compact.png')}}" alt=""></span>
                    <span class="brand-title">
                        <img src="{{ asset('images/logo-text.png')}}" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                            </a>
                                        </li>

                                        <hr class="my-2">
                                        <li>
                                            <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                                        </li>
                                        <li><a href="page-login.html"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="" id="menu">
                    <li class="nav-label"></li>
                    <li>
                        <a href="{{ route('role')}}" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text"> Roles</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user')}}" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('popularplace')}}" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Popular Place</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('placetoroam')}}" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Place To Roam</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('airport')}}" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">AirPort</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('meals')}}" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Meals</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('planemaster')}}" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Plane Master</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('seatmaster')}}" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Seat Master</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('journey')}}" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Journey Master</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('booking')}}" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Booking Master</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('bookingdetail')}}" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Booking Detail</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('bookingpassenger')}}" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Booking Passenger</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            @yield('content')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        {{-- <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
            </div>
        </div> --}}
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    {{-- <script src="{{ asset('plugins/common/common.min.js')}}"></script> --}}
    <script src="{{ asset('js/custom.min.js')}}"></script>
    <script src="{{ asset('js/settings.js')}}"></script>
    <script src="{{ asset('js/gleek.js')}}"></script>
    <script src="{{ asset('js/styleSwitcher.js')}}"></script>

    <!-- Chartjs -->
    <script src="{{ asset('plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Circle progress -->
    <script src="{{ asset('plugins/circle-progress/circle-progress.min.js')}}"></script>
    <!-- Datamap -->
    <script src="{{ asset('plugins/d3v3/index.js')}}"></script>
    <script src="{{ asset('plugins/topojson/topojson.min.js')}}"></script>
    <script src="{{ asset('plugins/datamaps/datamaps.world.min.js')}}"></script>
    <!-- Morrisjs -->
    <script src="{{ asset('plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{ asset('plugins/morris/morris.min.js')}}"></script>
    <!-- Pignose Calender -->
    <script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{ asset('plugins/pg-calendar/js/pignose.calendar.min.js')}}"></script>
    <!-- ChartistJS -->
    <script src="{{ asset('plugins/chartist/js/chartist.min.js')}}"></script>
    <script src="{{ asset('plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{ asset('js/dashboard/dashboard-1.js')}}"></script>


    @stack('scripts')

</body>

</html>
