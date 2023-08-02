<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @if (isset($title))
        <title>{{ $title }}</title>
    @endif
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="manifest" href="site.webmanifest"> --}}
    <link rel="shortcut icon" type="image/x-icon" href="client/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('client/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('client/css/owl.carousel.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('client/css/slicknav.css') }} ">
    <link rel="stylesheet" href="{{ asset('client/css/flaticon.css') }} ">
    <link rel="stylesheet" href="{{ asset('client/css/progressbar_barfiller.css') }} ">
    <link rel="stylesheet" href="{{ asset('client/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/animated-headline.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('client/css/style.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> --}}

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

        @include('client.layout.header')



        <main>
            <section class="slider-area slider-area2">
                <div class="slider-active">
                    <!-- Single Slider -->
                    <div class="single-slider slider-height2">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-8 col-lg-11 col-md-12">
                                    <div class="hero__caption hero__caption2">
                                        @if (isset($title))
                                            <h1 data-animation="bounceIn" data-delay="0.2s">{{ $title }}</h1>
                                        @endif

                                        <!-- breadcrumb Start-->
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                @if (isset($breadcrumbs))
                                                    @foreach ($breadcrumbs as $key => $breadcrumb)
                                                        @if ($key != count($breadcrumbs) - 1)
                                                            <li class="breadcrumb-item">
                                                                <a href="{{ $breadcrumb['url'] }}"
                                                                    class="text-primary">{{ $breadcrumb['name'] }}</a>
                                                            </li>
                                                        @else
                                                            <li class="breadcrumb-item active">{{ $breadcrumb }}</li>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </ol>
                                        </nav>
                                        <!-- breadcrumb End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="courses-area section-padding40 fix">
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </main>
        @include('client.layout.footer')
    </div>
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>
    <script src="{{ asset('client/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('client/js/vendor/jquery-1.12.4.min.js') }} "></script>
    <script src="{{ asset('client/js/popper.min.js') }}"></script>
    <script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('client/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('client/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client/js/slick.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('client/js/wow.min.js') }}"></script>
    <script src="{{ asset('client/js/animated.headline.js') }}"></script>
    <script src="{{ asset('client/js/jquery.magnific-popup.js') }}"></script>

    <!-- Date Picker -->
    <script src="{{ asset('client/js/gijgo.min.js') }}"></script>
    <!-- Nice-select, sticky -->
    <script src="{{ asset('client/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.sticky.js') }}"></script>
    <!-- Progress -->
    <script src="{{ asset('client/js/jquery.barfiller.js') }}"></script>

    <!-- counter , waypoint,Hover Direction -->
    <script src="{{ asset('client/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('client/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('client/js/hover-direction-snake.min.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('client/js/contact.js') }}"></script>
    <script src="{{ asset('client/js/jquery.form.js') }}"></script>
    <script src="{{ asset('client/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('client/js/mail-script.js') }}"></script>
    <script src="{{ asset('client/js/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('client/js/plugins.js') }}"></script>
    <script src="{{ asset('client/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif (Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });
    </script>
</body>

</html>
