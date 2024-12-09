<!doctype html>
<html lang="en" dir="ltr" data-bs-theme="light" data-bs-theme-color="theme-color-default">

<head>
    <!-- loader Start -->
    <x-partials.meta-content />
    <!-- loader END -->

    <title>@yield('title')</title>

    <!-- Styles Section Start -->
    <x-partials.styles />
    @stack('styles')
    <!-- Styles Section END -->

</head>

<body class="">
    <!-- loader Start -->
    <x-common.loader />
    <!-- loader END -->

    @if ($withOutHeaderSidebar)
        <!-- Sidebar Section Start -->
        <x-partials.sidebar />
        <!-- Sidebar Section End -->

        <main class="main-content">
            <!-- Header Section Start -->
            <div class="position-relative iq-banner">
                <x-partials.header />
                @yield('header-nav')
            </div>
            <!-- Header Section End -->

            <!-- Sidebar Section Start -->
            <div class="conatiner-fluid content-inner mt-n5 py-0" style="margin-top: 15px !important;">
                <div class="row">
                    @yield('content')
                </div>
            </div>
            <!-- Sidebar Section End -->

            <!-- Main Body Start -->
            <x-partials.footer />
            <!--  Main Body End -->
        </main>

        <!-- offcanvas start -->
        <x-partials.offcanvas />
        <!-- offcanvas End -->
    @else
        @yield('content')
    @endif

    <!-- Script Section Start -->
    <x-partials.scripts />
    @stack('scripts')
    <!-- Script Section END -->

</body>

</html>
