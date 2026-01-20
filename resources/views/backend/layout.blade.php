<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

    
<head>

        <meta charset="utf-8" />
        <title>
            @yield('title')
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/backend/')}}/assets/images/favicon.ico">

        <!-- jsvectormap css -->
        <link href="{{asset('assets/backend/')}}/assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

        <!-- gridjs css -->
        <link rel="stylesheet" href="{{asset('assets/backend/')}}/assets/libs/gridjs/theme/mermaid.min.css">

        <!-- Layout config Js -->
        <script src="{{asset('assets/backend/')}}/assets/js/layout.js"></script>
        <!-- Bootstrap Css -->
        <link href="{{asset('assets/backend/')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('assets/backend/')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('assets/backend')}}/assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <!-- custom Css-->
        <link href="{{asset('assets/backend/')}}/assets/css/custom.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        
        @yield('style')

    </head>

    <body>

        <!-- Begin page -->
        <div id="layout-wrapper">

    <header id="page-topbar">
        <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{asset('assets/backend/')}}/assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('assets/backend/')}}/assets/images/logo-dark.png" alt="" height="17">
                        </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{asset('assets/backend/')}}/assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('assets/backend/')}}/assets/images/logo-light.png" alt="" height="17">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger material-shadow-none" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
 
            </div>

            </div>
        </div>
        </div>
    </header>

<!-- removeNotificationModal -->
        
            <!-- ========== App Menu ========== -->
            <div class="app-menu navbar-menu">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <!-- Dark Logo-->
                    <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{asset('assets/backend/')}}/assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('assets/backend/')}}/assets/images/logo-dark.png" alt="" height="17">
                        </span>
                    </a>
                    <!-- Light Logo-->
                    {{-- <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{asset('assets/backend/')}}/assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('assets/backend/')}}/assets/images/logo-light.png" alt="" height="17">
                        </span>
                    </a> --}}
                    <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                        <i class="ri-record-circle-line"></i>
                    </button>
                </div>
    
              
                <div id="scrollbar">
                    <div class="container-fluid">


                        <div id="two-column-menu">
                        </div>
                        <ul class="navbar-nav" id="navbar-nav">
                            <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                            <li class="nav-item">
                                 <li class="nav-item">
                                  <a href="#" class="nav-link" data-key="t-basic-action"> Dashboard </a>
                                </li>
                                 <li class="nav-item">
                                  <a href="{{route('category.index')}}" class="nav-link" data-key="t-basic-action"> Category </a>
                                </li>
                                 <li class="nav-item">
                                  <a href="{{route('subCategory.index')}}" class="nav-link" data-key="t-basic-action"> Subcategory </a>
                                </li>
                                 <li class="nav-item">
                                  <a href="{{route('products.index')}}" class="nav-link" data-key="t-basic-action"> Products </a>
                                </li>
                                </li>
                                 <li class="nav-item">
                                  <a href="#" class="nav-link" data-key="t-basic-action"> Orders </a>
                                </li>
                                 <li class="nav-item">
                                  <a href="#" class="nav-link" data-key="t-basic-action"> Sell </a>
                                </li>
                                 <li class="nav-item">
                                  <a href="#" class="nav-link" data-key="t-basic-action"> Stock </a>
                                </li>
                                
                            </li> <!-- end Dashboard Menu -->
                            {{-- <li class="nav-item">
                                <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                    <i class="ri-apps-2-line"></i> <span data-key="t-apps">Apps</span>
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarApps">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="#sidebarCalendar" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                                                Calendar
                                            </a>
                                            
                                        </li>
                                        <li class="nav-item">
                                            <a href="apps-chat.html" class="nav-link" data-key="t-chat"> Chat </a>
                                        </li>
                                      
                                    
                                       
                                    </ul>
                                </div>
                            </li> --}}

                     </ul>
                    </div>
                    <!-- Sidebar -->
                </div>

                <div class="sidebar-background"></div>
            </div>
            <!-- Left Sidebar End -->
            <!-- Vertical Overlay-->
            <div class="vertical-overlay"></div>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                      @yield('breadcrumb')
                        <!-- end page title -->
                        @yield('content')
 
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->



        <!--start back-to-top-->
        <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>
        <!--end back-to-top-->

        <!--preloader-->
        <div id="preloader">
            <div id="status">
                <div class="spinner-border text-primary avatar-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

      

        <!-- JAVASCRIPT -->
        <script src="{{asset('assets/backend/')}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('assets/backend/')}}/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="{{asset('assets/backend/')}}/assets/libs/node-waves/waves.min.js"></script>
        <script src="{{asset('assets/backend/')}}/assets/libs/feather-icons/feather.min.js"></script>
        <script src="{{asset('assets/backend/')}}/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
        <script src="{{asset('assets/backend/')}}/assets/js/plugins.js"></script>

        <!-- apexcharts -->
        <script src="{{asset('assets/backend/')}}/assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- Vector map-->
        <script src="{{asset('assets/backend/')}}/assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
        <script src="{{asset('assets/backend/')}}/assets/libs/jsvectormap/maps/world-merc.js"></script>

        <!-- gridjs js -->
        <script src="{{asset('assets/backend/')}}/assets/libs/gridjs/gridjs.umd.js"></script>

        <!-- Dashboard init -->
        <script src="{{asset('assets/backend/')}}/assets/js/pages/dashboard-job.init.js"></script>

        <!-- App js -->
        <script src="{{asset('assets/backend/')}}/assets/js/app.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" 
       crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @if (session()->has('message'))
        <script>
        alert('{{session()->get('message') }}');
        </script>
        
        @endif
       
        @yield('script')
        @stack('script')
    </body>


</html>