<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ url('assets/images/admin/logo-lumbung-png.png') }}" />

        <!-- Vendor css (Require in all Page) -->
        <link href="{{ url('assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Icons css (Require in all Page) -->
        <link href="{{ url('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- App css (Require in all Page) -->
        <link href="{{ url('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Theme Config js (Require in all Page) -->
        <script src="{{ url('assets/js/config.js') }}"></script>

    </head>
    <body class="authentication-bg">
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="card auth-card">
                            <div class="card-body p-0">
                                <div class="row align-items-center g-0">
                                    <div class="col-lg-6 d-none d-lg-inline-block border-end">
                                        <div class="auth-page-sidebar">
                                            <img src="https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif" alt="auth" class="img-fluid" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="p-4">
                                            <div class="mx-auto mb-4 text-center">
                                                <div class="mx-auto text-center auth-logo">
                                                    <a href="#" class="logo-dark">
                                                        <img src="{{ url('assets/images/logo/hugostudio.png') }}" width="140" class="me-1 mb-0" alt="logo sm" />
                                                    </a>

                                                    <a href="#" class="logo-light">
                                                        <img src="{{ url('assets/images/logo/hugostudio.png') }}" width="140" class="me-1 mb-0" alt="logo sm" />
                                                    </a>
                                                </div>

                                                <h1 class="mt-5 mb-3 fw-bold fs-60">
                                                    @yield('code')
                                                </h1>
                                                <h2 class="fs-22 lh-base">
                                                    @yield('message')
                                                </h2>
                                                <p class="text-muted mt-1 mb-4">
                                                    yuk balik sebelum tersesat.
                                                </p>

                                                <div class="text-center">
                                                    <button type="button" onclick="window.history.back();" class="btn btn-success">Back to Home</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
        </div>

        <!-- Vendor Javascript (Require in all Page) -->
        <script src="{{ url('assets/js/vendor.js') }}"></script>

        <!-- App Javascript (Require in all Page) -->
        <script src="{{ url('assets/js/app.js') }}"></script>


        <!-- Vector Map Js -->
        <script src="{{ url('assets/vendor/jsvectormap/js/jsvectormap.min.js') }}"></script>
        <script src="{{ url('assets/vendor/jsvectormap/maps/world-merc.js') }}"></script>
        <script src="{{ url('assets/vendor/jsvectormap/maps/world.js') }}"></script>

        <!-- Dashboard Js -->
        <script src="{{ url('assets/js/pages/dashboard.analytics.js') }}"></script>
    </body>
</html>
