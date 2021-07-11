<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Highdmin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ url('/backend') }}/images/favicon.ico">

        <!-- App css -->
        <link href="{{ url('/backend') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/backend') }}/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/backend') }}/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/backend') }}/css/style.css" rel="stylesheet" type="text/css" />

        <script src="{{ url('/backend') }}/js/modernizr.min.js"></script>

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">

                <div class="slimscroll-menu" id="remove-scroll">

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href=" {{ url('/category') }} " class="logo">
                            <span>
                                <img src="{{ url('/backend') }}/images/logo.png" alt="" height="22">
                            </span>
                            <i>
                                <img src="{{ url('/backend') }}/images/logo_sm.png" alt="" height="28">
                            </i>
                        </a>
                    </div>

                    <!-- User box -->
                    <div class="user-box">
                        <div class="user-img">
                            <img src="{{ url('/backend') }}/images/users/avatar-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                        </div>
                        <h5>
                            @auth
                                {{ Auth::user()->name }}
                            @endauth
                        </h5>
                        <p class="text-muted">****</p>
                    </div>

                    <!--- Sidemenu -->
                    @auth
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <!--<li class="menu-title">Navigation</li>-->

                            <li>
                                <a href="{{ route('home') }}">
                                    <i class="fi-air-play"></i><span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href=" {{ url('/') }} " target=" _blank ">
                                    <i class="fi-globe"></i> <span> Visit Website </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fa fa-paragraph"></i><span> Forntent Profile </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('Profile') }}">Add</a></li>
                                    <li><a href="{{ route('ProfileView') }}">View</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-layers"></i> <span> Category </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a class="fa fa-plus" href=" {{ url('/category') }} ">  Add</a></li>
                                    <li><a class="fa fa-podcast" href=" {{ url('/categoryView') }} ">View</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class=" fa fa-tree "></i> <span>Sub Category </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a class="fa fa-plus " href=" {{ url('/subcategory') }} ">  Add</a></li>
                                    <li><a class="fa fa-podcast " href=" {{ url('/subcategoryView') }} ">  View</a></li>
                                    <li><a class="fa fa-deafness " href=" {{ url('/subcategorydeletedView') }} ">  Delete View</a></li>

                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-layers"></i> <span> Product </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a class="fa fa-plus" href=" {{ url('/product') }} ">  Add</a></li>
                                    <li><a class="fa fa-podcast" href=" {{ url('/productView') }} ">View</a></li>
                                    <li><a class="fa fa-angellist" href=" {{ url('/productdeletedView') }} ">Deleted View</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-box"></i><span> Best Seler </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('BestSelar') }}">Bast Add</a></li>
                                    <li><a href="{{ route('BestSelarview') }}">View Seler</a></li>

                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fa fa-calculator"></i><span> Coupon </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('coupon') }}">Add</a></li>
                                    <li><a href="{{ route('couponview') }}">View</a></li>

                                </ul>
                            </li>

                            <li>
                                <a href=" {{ route('MessageView') }} ">
                                    <i class="fa fa-envelope"></i> <span> Message </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fa fa-scribd"></i><span> Slider </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ url('/slider') }}">Add</a></li>
                                    <li><a href="{{ url('/sliderview') }}">View</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-command"></i><span> Social Media </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('Social') }}">Add</a></li>
                                    <li><a href="{{ route('SocialView') }}">View</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-paper-stack"></i><span> Pages </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="page-starter.html">Starter Page</a></li>
                                    <li><a href="page-login.html">Login</a></li>
                                    <li><a href="page-register.html">Register</a></li>
                                    <li><a href="page-logout.html">Logout</a></li>
                                    <li><a href="page-recoverpw.html">Recover Password</a></li>
                                    <li><a href="page-lock-screen.html">Lock Screen</a></li>
                                    <li><a href="page-confirm-mail.html">Confirm Mail</a></li>
                                    <li><a href="page-404.html">Error 404</a></li>
                                    <li><a href="page-404-alt.html">Error 404-alt</a></li>
                                    <li><a href="page-500.html">Error 500</a></li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                    @endauth
                    <!-- Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>

            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                <!-- Top Bar Start -->
                <div class="topbar">

                    <nav class="navbar-custom">

                        <ul class="list-unstyled topbar-right-menu float-right mb-0">

                            <li class="hide-phone app-search">
                                <form>
                                    <input type="text" placeholder="Search..." class="form-control">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </li>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <i class="fi-bell noti-icon"></i>
                                <span class="badge badge-danger badge-pill noti-icon-badge">4</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">


                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0"><span class="float-right"><a href="#" class="text-dark"><small>Clear All</small></a> </span>Notification</h5>
                                </div>

                                <div class="slimscroll" style="max-height: 230px;">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">1 min ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info"><i class="mdi mdi-account-plus"></i></div>
                                        <p class="notify-details">New user registered.<small class="text-muted">5 hours ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-danger"><i class="mdi mdi-heart"></i></div>
                                        <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">3 days ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning"><i class="mdi mdi-comment-account-outline"></i></div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">4 days ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-purple"><i class="mdi mdi-account-plus"></i></div>
                                        <p class="notify-details">New user registered.<small class="text-muted">7 days ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-custom"><i class="mdi mdi-heart"></i></div>
                                        <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">13 days ago</small></p>
                                    </a>
                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                    View all <i class="fi-arrow-right"></i>
                                </a>

                            </div>
                        </li>

                        @php
                            $message = \App\Message::all();
                            $messagecount = \App\Message::count();
                        @endphp

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="fi-speech-bubble noti-icon"></i>
                            <span class="badge badge-custom badge-pill noti-icon-badge">{{ $messagecount }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">


                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="m-0"><span class="float-right"><a href="#" class="text-dark"><small>Clear All</small></a> </span>Chat</h5>
                            </div>

                            <div class="slimscroll" style="max-height: 230px;">
                                <!-- item-->
                                @foreach($message as $value)
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon"><img src="{{ url('/backend') }}/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                    <p class="notify-details">{{ $value->name }}</p>
                                    <p class="text-muted font-13 mb-0 user-msg">{{ $value->msg }}</p>
                                </a>
                                @endforeach
                            </div>

                            <!-- All-->
                            <a href="{{ route('MessageView') }}" class="dropdown-item text-center text-primary notify-item notify-all">
                                View all <i class="fi-arrow-right"></i>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        <img src="{{ url('/backend') }}/images/users/avatar-1.jpg" alt="user" class="rounded-circle"> <span class="ml-1">
                            @auth
                                {{ Auth::user()->name }}
                            @endauth
                            <i class="mdi mdi-chevron-down"></i> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fi-head"></i> <span>My Account</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fi-cog"></i> <span>Settings</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fi-help"></i> <span>Support</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fi-lock"></i> <span>Lock Screen</span>
                        </a>

                        <!-- item-->
                        <a class="dropdown-item notify-item fi-power" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </div>
                </li>

            </ul>

            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left disable-btn">
                        <i class="dripicons-menu"></i>
                    </button>
                </li>
                <li>
                    <div class="page-title-box">
                        <h4 class="page-title">Dashboard </h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">Welcome to Highdmin admin panel !</li>
                        </ol>
                    </div>
                </li>

            </ul>

        </nav>

    </div>
    <!-- Top Bar End -->



    <!-- Start Page content -->
    {{-- <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="header-title mb-4">Account Overview</h4>

                    </div>
                </div>
            </div>
        </div> <!-- container -->

    </div> <!-- content --> --}}
    @yield('content')

    <footer class="footer">
        A A A Tohoney @2020
    </footer>

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->



    <!-- jQuery  -->
    <script src="{{ url('/backend') }}/js/jquery.min.js"></script>
    <script src="{{ url('/backend') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/backend') }}/js/metisMenu.min.js"></script>
    <script src="{{ url('/backend') }}/js/waves.js"></script>
    <script src="{{ url('/backend') }}/js/jquery.slimscroll.js"></script>

    <!-- Flot chart -->
    <script src="../plugins/flot-chart/jquery.flot.min.js"></script>
    <script src="../plugins/flot-chart/jquery.flot.time.js"></script>
    <script src="../plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
    <script src="../plugins/flot-chart/jquery.flot.resize.js"></script>
    <script src="../plugins/flot-chart/jquery.flot.pie.js"></script>
    <script src="../plugins/flot-chart/jquery.flot.crosshair.js"></script>
    <script src="../plugins/flot-chart/curvedLines.js"></script>
    <script src="../plugins/flot-chart/jquery.flot.axislabels.js"></script>

    <!-- KNOB JS -->
            <!--[if IE]>
            <script type="text/javascript" src="../plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="../plugins/jquery-knob/jquery.knob.js"></script>

        <!-- Dashboard Init -->
        <script src="{{ url('/backend') }}/pages/jquery.dashboard.init.js"></script>

        <!-- App js -->
        <script src="{{ url('/backend') }}/js/jquery.core.js"></script>
        <script src="{{ url('/backend') }}/js/jquery.app.js"></script>

    </body>

</html>
