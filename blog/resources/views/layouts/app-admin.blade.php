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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


@yield('script')
</body>

</html>
