<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/admin/assets/images/favicon.png')}}">
    <title>NGÀY MỚI 24H</title>
    <!-- Custom CSS -->
    <link href="{{asset('public/admin/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('public/admin/dist/css/style.min.css')}}" rel="stylesheet">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" href="{{asset('public/admin/css/admin.css')}}">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('public/admin/css/bootstrap.min.css')}}">
    
    <title>@yield('title')</title>
    <script src="{{asset('public/admin/js/jquery-3.3.1.min.js')}}"></script>    
    <!-- ckeditor -->
    <script src="{{asset('public/admin/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('public/admin/ckfinder/ckfinder.js')}}"></script>
    @yield('header_script')
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <a href="{{route('admin.verify')}}" class="logo">
                            <!-- Logo icon -->
                            <b class="logo-icon">
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <img src="{{asset('public/admin/assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
                                
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                              
                                <!-- Light Logo text -->
                                <img src="{{asset('public/admin/assets/images/bottom_logo.png')}}" class="light-logo" alt="homepage" width="100%" />
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="ml-3">{{Auth::user()->name}}</li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-magnify font-20 mr-1"></i>
                                    <div class="ml-1 d-none d-sm-block">
                                        <span>Tìm kiếm bài viết nhanh</span>
                                    </div>
                                </div>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li> -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('public/admin/assets/images/users/1.jpg')}}" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <!-- <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> Logout</a> -->
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Thoát hệ thống') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                <!-- <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> Quản lý Chuyên mục</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Quản lý bản viết</a> -->
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.verify')}}" aria-expanded="false">
                                <i class="mdi mdi-av-timer"></i>
                                <span class="hide-menu">Bảng điều khiển</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.user.index')}}" aria-expanded="false">
                                <i class="mdi mdi-account-network"></i>
                                <span class="hide-menu">Quản lý Người dùng</span>
                            </a>
                        </li>
                         <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.category.index')}}" aria-expanded="false">
                                <i class="mdi mdi-arrange-bring-forward"></i>
                                <span class="hide-menu">Quản lý Chuyên mục</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.post.index')}}" aria-expanded="false">
                                <i class="mdi mdi-border-none"></i>
                                <span class="hide-menu">Quản lý Bài viết</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.advertisement.index')}}" aria-expanded="false">
                                <i class="mdi mdi-face"></i>
                                <span class="hide-menu">Banner Chuyên Mục</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.advertisement1.index')}}" aria-expanded="false">
                                <i class="mdi mdi-face"></i>
                                <span class="hide-menu">Banner Phải</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.video.index')}}" aria-expanded="false">
                                <i class="mdi mdi-file"></i>
                                <span class="hide-menu">Quản lý Video</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.giaodien.index')}}" aria-expanded="false">
                                <i class="mdi mdi-alert-outline"></i>
                                <span class="hide-menu">Quản lý Giao diện</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">   @yield('content')  </div>
        <!-- end Page wrapper  -->
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by CVC Company. Designed and Developed by
                <a href="https://congviet.com.vn">Squirrel Trường</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
     @yield('bottom_script')
    <!-- kết thúc cho thanh menu -->

    <script src="{{asset('public/admin/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('public/admin/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('public/admin/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('public/admin/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('public/admin/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('public/admin/dist/js/custom.min.js')}}"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{asset('public/admin/assets/libs/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{asset('public/admin/dist/js/pages/dashboards/dashboard1.js')}}"></script>
</body>

</html>