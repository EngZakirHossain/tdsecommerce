<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>TdSCom | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="TDS Ecommerce || " name="description">
    <meta content="Themesbrand" name="author">

    @include('backend.layouts.inc.style')

</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">


        @include('backend.layouts.inc.topMenuBar')

        @include('backend.layouts.inc.leftMenuBar')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h6 class="page-title">@yield('page_title')</h6>
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">@yield('page_title')</li>
                                </ol>
                            </div>
                            @yield('add_button')
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- end page title -->
                    @yield('admin_content')

                    @include('backend.layouts.inc.footer')

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->

    </div>


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    @include('backend.layouts.inc.script')

</body>

</html>
