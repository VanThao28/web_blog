<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials.admin.head')
</head>

<body>

<!-- Begin page -->
<div id="wrapper">


    <!-- Topbar Start -->
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <li class="dropdown d-none d-lg-block">
                <a class="nav-link dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="/themes/adminTpl/assets\images\flags\us.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">English <i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="/themes/adminTpl/assets\images\flags\spain.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Spanish</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="/themes/adminTpl/assets\images\flags\italy.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Italian</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="/themes/adminTpl/assets\images\flags\french.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">French</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="/themes/adminTpl/assets\images\flags\russia.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Russian</span>
                    </a>
                </div>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="mdi mdi-bell noti-icon"></i>
                    <span class="badge badge-danger rounded-circle noti-icon-badge">4</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="font-16 m-0">
                            <span class="float-right">
                                <a href="" class="text-dark">
                                    <small>Clear All</small>
                                </a>
                            </span>Notification
                        </h5>
                    </div>

                    <div class="slimscroll noti-scroll">

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
                            <div class="notify-icon bg-primary">
                                <i class="mdi mdi-heart"></i>
                            </div>
                            <p class="notify-details">Carlos Crouch liked <b>Admin</b>
                                <small class="text-muted">13 days ago</small>
                            </p>
                        </a>
                    </div>

                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item text-primary text-center notify-item notify-all ">
                        View all
                        <i class="fi-arrow-right"></i>
                    </a>

                </div>
            </li>



            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ ShowImageUsers(Auth::user()->image_users) }}" alt="null" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                            {{ Auth::user()->name }}<i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('login')"
                                               onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>

                </div>
            </li>

        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="{{route('admin.index')}}" class="logo text-center logo-dark">
                        <span class="logo-lg">
                            <img src="/themes/adminTpl/assets\images\logo-dark.png" alt="" height="26">
                            <!-- <span class="logo-lg-text-dark">Simple</span> -->
                        </span>
                <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">S</span> -->
                            <img src="/themes/adminTpl/assets\images\logo-sm.png" alt="" height="22">
                        </span>
            </a>

            <a href="{{route('admin.index')}}" class="logo text-center logo-light">
                        <span class="logo-lg">
                            <img src="/themes/adminTpl/assets\images\logo-light.png" alt="" height="26">
                            <!-- <span class="logo-lg-text-light">Simple</span> -->
                        </span>
                <span class="logo-sm">
                            <!-- <span class="logo-lg-text-light">S</span> -->
                            <img src="/themes/adminTpl/assets\images\logo-sm.png" alt="" height="22">
                        </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>

            <li class="d-none d-sm-block">
                <form class="app-search">
                    <div class="app-search-box">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </li>
        </ul>
    </div>
    <!-- end Topbar --> <!-- ========== Left Sidebar Start ========== -->
    @include('layouts.partials.admin.sidebar_menu')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <div class="content">

            <!-- Start container-fluid -->
            <div class="container-fluid">
                {{ $slot }}
            </div>

        </div>
        <!-- end content -->
    </div>

    <!-- END content-page -->

</div>
<!-- END wrapper -->



<!-- Vendor js -->
<script src="/themes/adminTpl/assets\js\vendor.min.js"></script>

<script src="/themes/adminTpl/assets\libs\morris-js\morris.min.js"></script>
<script src="/themes/adminTpl/assets\libs\raphael\raphael.min.js"></script>

<script src="/themes/adminTpl/assets\js\pages\dashboard.init.js"></script>

<!-- App js -->
<script src="/themes/adminTpl/assets\js\app.min.js"></script>
{{--jquery--}}
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<!-- Vendor js -->
<script src="/themes/adminTpl/assets\libs\moment\moment.min.js"></script>
<script src="/themes/adminTpl/assets\libs\bootstrap-tagsinput\bootstrap-tagsinput.min.js"></script>
<script src="/themes/adminTpl/assets\libs\switchery\switchery.min.js"></script>
<script src="/themes/adminTpl/assets\libs\select2\select2.min.js"></script>
<script src="/themes/adminTpl/assets\libs\parsleyjs\parsley.min.js"></script>

<script src="/themes/adminTpl/assets\libs\bootstrap-filestyle2\bootstrap-filestyle.min.js"></script>
<script src="/themes/adminTpl/assets\libs\bootstrap-timepicker\bootstrap-timepicker.min.js"></script>
<script src="/themes/adminTpl/assets\libs\bootstrap-colorpicker\bootstrap-colorpicker.min.js"></script>

<script src="/themes/adminTpl/assets\libs\clockpicker\bootstrap-clockpicker.min.js"></script>
<script src="/themes/adminTpl/assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.js"></script>
<script src="/themes/adminTpl/assets\libs\bootstrap-daterangepicker\daterangepicker.js"></script>
<!-- Summerno js -->
<script src="/themes/adminTpl/assets\libs\summernote\summernote-bs4.min.js"></script>

<!-- Init js-->
<script src="/themes/adminTpl/assets\js\pages\form-advanced.init.js"></script>

@yield('script')
</body>

</html>
