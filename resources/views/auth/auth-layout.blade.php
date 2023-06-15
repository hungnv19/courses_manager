<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    @if (isset($title))
        <title>{{ $title }}</title>
    @endif
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{ asset('lecturer/img/favicon/favicon.ico') }} " />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../lecturer/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{ asset('lecturer/vendor/css/core.css') }} " class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('lecturer/vendor/css/theme-default.css') }} "
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('lecturer/css/demo.css') }} " />
    <link rel="stylesheet" href="{{ asset('lecturer/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}  " />
    <link rel="stylesheet" href="{{ asset('lecturer/vendor/css/pages/page-auth.css') }}  " />
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


    <div id="app">
        <div class="wrapper">
            @yield('content')
        </div>
    </div>


    <script src="{{ asset('lecturer/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('lecturer/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('lecturer/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('lecturer/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('lecturer/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('lecturer/js/main.js') }}"></script>

</body>

</html>
