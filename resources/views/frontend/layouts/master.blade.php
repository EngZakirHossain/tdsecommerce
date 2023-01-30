<!doctype html>
<html lang="en" class="no-js">

<head>
    <title>TDS eCommerce || @yield('title')</title>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="meta description">
    @include('frontend.layouts.inc.style')
</head>

<body>
    <div class="body-wrapper">
        <!-- announcement bar start -->
        @include('frontend.layouts.inc.announcement')
        <!-- announcement bar end -->

        <!-- header start -->
        @include('frontend.layouts.inc.topMenuBar')
        <!-- header end -->
        {{-- main content  --}}

        <main id="MainContent" class="content-for-layout">
            @yield('frontedn_content')
        </main>
        {{-- End main content  --}}
        <!-- footer start -->
        @include('frontend.layouts.inc.footer')
        <!-- footer end -->

        <!-- scrollup start -->
        <button id="scrollup">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="18 15 12 9 6 15"></polyline>
            </svg>
        </button>
        <!-- scrollup end -->


        <!-- drawer menu start -->
        @include('frontend.layouts.inc.mobileMenu')
        <!-- drawer menu end -->

        <!-- drawer cart start -->
        @include('frontend.layouts.inc.cart')
        <!-- drawer cart end -->

        <!-- newsletter subscribe modal start -->
        {{-- @include('frontend.layouts.inc.newsletter') --}}
        <!-- newsletter subscribe modal end -->
        <!-- all js -->
        @include('frontend.layouts.inc.script')

    </div>
</body>

</html>
