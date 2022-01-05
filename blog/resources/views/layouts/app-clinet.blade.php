<!doctype html>
<html class="no-js" lang="zxx">
<head>
    @include('layouts.partials.client.head')
</head>

<body>


<header>
    @include('layouts.partials.client.header')
</header>

<main>
   {{ $slot }}
</main>

<footer>
    @include('layouts.partials.client.footer')
</footer>

<!-- JS here -->
<!-- All JS Custom Plugins Link Here here -->
<script src="/themes/aznews/assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="/themes/aznews/assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="/themes/aznews/assets/js/popper.min.js"></script>
<script src="/themes/aznews/assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="/themes/aznews/assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="/themes/aznews/assets/js/owl.carousel.min.js"></script>
<script src="/themes/aznews/assets/js/slick.min.js"></script>
<!-- Date Picker -->
<script src="/themes/aznews/assets/js/gijgo.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="/themes/aznews/assets/js/wow.min.js"></script>
<script src="/themes/aznews/assets/js/animated.headline.js"></script>
<script src="/themes/aznews/assets/js/jquery.magnific-popup.js"></script>

<!-- Breaking New Pluging -->
<script src="/themes/aznews/assets/js/jquery.ticker.js"></script>
<script src="/themes/aznews/assets/js/site.js"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="/themes/aznews/assets/js/jquery.scrollUp.min.js"></script>
<script src="/themes/aznews/assets/js/jquery.nice-select.min.js"></script>
<script src="/themes/aznews/assets/js/jquery.sticky.js"></script>

<!-- contact js -->
<script src="/themes/aznews/assets/js/contact.js"></script>
<script src="/themes/aznews/assets/js/jquery.form.js"></script>
<script src="/themes/aznews/assets/js/jquery.validate.min.js"></script>
<script src="/themes/aznews/assets/js/mail-script.js"></script>
<script src="/themes/aznews/assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="/themes/aznews/assets/js/plugins.js"></script>
<script src="/themes/aznews/assets/js/main.js"></script>

@yield('script')
</body>
</html>
