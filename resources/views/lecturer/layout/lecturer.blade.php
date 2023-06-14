<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-lecturer-path="../lecturer/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('lecturer/img/favicon/favicon.ico') }} " />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../lecturer/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('lecturer/vendor/css/core.css') }} " class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('lecturer/vendor/css/theme-default.css') }} "
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('lecturer/css/demo.css') }} " />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('lecturer/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}  " />

    <link rel="stylesheet" href="{{ asset('lecturer/vendor/libs/apex-charts/apex-charts.css') }}  " />
    <script src="{{ asset('lecturer/vendor/js/helpers.js') }}  "></script>
    <script src="{{ asset('lecturer/js/config.js') }}  "></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        window.Laravel = {!! json_encode(
            [
                'csrfToken' => csrf_token(),
                'baseUrl' => url('/'),
            ],
            JSON_UNESCAPED_UNICODE,
        ) !!};
    </script>
</head>

<body>
    <!-- Layout wrapper -->
    <div id="app">
        <div class="wrapper">
            <div class="layout-wrapper layout-content-navbar">

                <div class="layout-container">
                    <!-- Menu -->
                    @include('lecturer.layout.aside')
                    <div class="layout-page">

                        @include('lecturer.layout.nav')


                        <div class="content-wrapper">
                            <!-- Content -->

                            <div class="container-xxl flex-grow-1 container-p-y">
                                @yield('content')
                            </div>
                            @include('lecturer.layout.footer')

                            <div class="content-backdrop fade"></div>
                        </div>
                    </div>
                </div>
                <div class="layout-overlay layout-menu-toggle"></div>
            </div>
        </div>
    </div>






    <!-- Core JS -->
    <!-- build:js lecturer/vendor/js/core.js -->
    <script src="{{ asset('lecturer/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('lecturer/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('lecturer/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('lecturer/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('lecturer/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('lecturer/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('lecturer/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('lecturer/js/dashboards-analytics.js') }}"></script>


</body>

</html>
