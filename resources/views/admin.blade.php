<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name=”robots” content="noindex, nofollow">
    <!-- App favicon -->
    @yield('head')
    <!-- App css -->
    <link href="{{ asset('web_assets/admin/css/config/default/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="{{ asset('web_assets/admin/css/config/default/app.min.css') }}" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />
    <!-- icons -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body[data-sidebar-color=gradient] .menuitem-active>a {
            color: #ffffffb3 !important;
        }

        .tox-notifications-container {
            display: none;
        }

        .images_row {
            background: transparent;
            row-gap: 0.5em;
        }

        .modal_images_row {
            height: 400px;
            overflow-y: scroll;
            row-gap: 0.725em;
        }

        .modal_images_row .image-box {
            border: 2px solid transparent;
        }

        .modal_images_row .image-box.selected-box {
            border-color: lightseagreen;
        }

        .images_row div.image-box {
            background: gainsboro;
        }

        .img-fluid.rounded {
            height: 150px;
            object-fit: contain;
            width: 100%;
            background: #8080802e;
            padding: 5px;
        }

        .col-gap-2 {
            column-gap: 2em;
        }

        .tox-editor-container .tox-editor-header {
            opacity: 0.1;
        }

        .show-menubar .tox-editor-header {
            opacity: 1;
        }

        #side-menu .nav-second-level {
            background: rgb(89, 57, 154);
            box-shadow: rgb(82 53 145) 0px 5px 5px inset;
            padding-left: 25px;
        }

        .menu-arrow {
            top: 22px;
        }

        .tox .tox-toolbar__group:last-child button {
            background-color: #2196f3;
            color: #fff;
        }

        .logo-box {
            width: 170px;
        }

        .left-side-menu {
            width: 170px;
        }

        #side-menu img {
            width: 17px;
            margin-right: 5px;
            filter: brightness(0) invert(1);
        }

        .logo-box a:hover {
            background: #4e3490;
        }

        #sidebar-menu>ul>li>a {
            padding: 16px 20px;
        }

        #sidebar-menu>ul>li>a:hover {
            background: #4e3490;
        }

        .content-page {
            margin-left: 170px;
        }

        .footer {
            left: 170px;
        }
    </style>
</head>

<!-- body start -->

<body class="loading"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "gradient", "size": "default", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": false}'>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        @include('layout.admin.topbar')
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('layout.admin.leftBar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    @yield('content')

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            @include('layout.admin.footer')
            <!-- end Footer -->
        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->

    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script defer src="{{ asset('web_assets/admin/js/vendor.min.js') }}"></script>

    @yield('script')
    <!-- App js-->
    <script defer src="{{ asset('web_assets/admin/js/app.min.js') }}"></script>
</body>

</html>
