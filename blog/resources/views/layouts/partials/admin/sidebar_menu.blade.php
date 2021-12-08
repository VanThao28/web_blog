<div class="left-side-menu">

    <div class="user-box">
        <div class="float-left">
            <img src="/themes/adminTpl/assets\images\users\avatar-1.jpg" alt="" class="avatar-md rounded-circle">
        </div>
        <div class="user-info">
            <a href="#">{{Auth::user()->name}}</a>
            <p class="text-muted m-0">Administrator</p>
        </div>
    </div>

    <!--- Sidemenu -->
    <div id="sidebar-menu">

        <ul class="metismenu" id="side-menu">

            <li class="menu-title">Navigation</li>

            <li>
                <a href="index.html">
                    <i class="fas fa-user"></i>
                    <span> User </span>
                </a>
            </li>

            <li>
                <a href="ui-elements.html">
                    <i class="fas fa-book"></i>
                    <span> Post </span>
                </a>
            </li>
        </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
