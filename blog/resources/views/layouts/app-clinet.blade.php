<!doctype html>
<html class="no-js" lang="zxx">
<head>
    @include('layouts.partials.client.head')
</head>

<body>

<!-- Preloader Start -->
<!-- <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="assets/img/logo/logo.png" alt="">
            </div>
        </div>
    </div>
</div> -->
<!-- Preloader Start -->

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
    @include('layouts.partials.client.javascript')

</body>
</html>
