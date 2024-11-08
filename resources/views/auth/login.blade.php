<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Presensi Kehadiran</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta
            name="description"
            content="A fully responsive premium admin dashboard template"
        />
        <meta name="author" content="Techzaa" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ url('assets/images/logo/logo-hs.png') }}" />

        <!-- Vendor css (Require in all Page) -->
        <link href="{{ url('assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Icons css (Require in all Page) -->
        <link href="{{ url('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- App css (Require in all Page) -->
        <link href="{{ url('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Theme Config js (Require in all Page) -->
        <script src="{{ url('assets/js/config.js') }}"></script>

        {{-- css --}}
        <link rel="stylesheet" href="{{ url('assets/css/main.css') }}">

        {{-- locatioon --}}
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

        {{-- costum css yajra --}}
        {{-- <link href="{{ url('assets/css/costum-yajra/main.css') }}" rel="stylesheet" type="text/css" /> --}}

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

    </head>
    <body class="authentication-bg">
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="card auth-card">
                            <div class="card-body px-3 py-5">
                                <div class="mx-auto mb-4 text-center auth-logo">
                                    <a href="index.php" class="logo-dark">
                                        <img src="{{ url('assets/images/logo/hugostudio.png') }}" height="30" class="me-1" alt="logo sm" />
                                    </a>
                                </div>

                                {{-- <h2 class="fw-bold text-center fs-18">
                                    Login
                                </h2> --}}

                                <div class="px-4">
                                    <form action="{{ route('check') }}" class="authentication-form" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email" />
                                        </div>
                                        <div class="mb-3">
                                            <a href="auth-password2.php" class="float-end text-muted text-underline-dashed ms-1">Reset password</a>
                                            <label class="form-label" for="password">Kata Sandi</label>
                                            <input type="password" id="password" class="form-control" name="password" placeholder="Masukkan kata sandi" />
                                        </div>

                                        <!-- Tambahkan checkbox untuk Show Password -->
                                        <div class="form-check mb-3">
                                            <input type="checkbox" class="form-check-input" id="showPassword" onclick="togglePassword()">
                                            <label class="form-check-label" for="showPassword">Tampilkan Kata Sandi</label>
                                        </div>

                                        <div class="mb-1 text-center d-grid">
                                            <button class="btn btn-primary" type="submit">
                                                Masuk
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>

        <script>
            function togglePassword() {
                var passwordField = document.getElementById("password");
                if (passwordField.type === "password") {
                    passwordField.type = "text";
                } else {
                    passwordField.type = "password";
                }
            }
            </script>

         <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
         <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

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

        <!-- Apex Chart Column Demo js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.0/dayjs.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.0/plugin/quarterOfYear.min.js"></script>
        <script src="{{ url('assets/js/components/apexchart-column.js') }}"></script>

        <!-- Apex Chart line Demo js -->
        <script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>
        <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
        <script src="{{ url('assets/js/components/apexchart-line.js') }}"></script>

        <!-- Dashboard Js -->
        <script src="{{ url('assets/js/pages/dashboard.sales.js') }}"></script>
    </body>
</html>
