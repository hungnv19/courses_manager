<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Courses | Education</title>
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
                                        <h1 data-animation="bounceIn" data-delay="0.2s">Our courses</h1>
                                        <!-- breadcrumb Start-->
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                                <li class="breadcrumb-item"><a href="#">Services</a></li>
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
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-8">
                            <div class="section-tittle text-center mb-55">
                                <h2>Our featured courses</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="properties properties2 mb-30">
                                <div class="properties__card">
                                    <div class="properties__img overlay1">
                                        <a href="#"><img src="assets/img/gallery/featured1.png"
                                                alt=""></a>
                                    </div>
                                    <div class="properties__caption">
                                        <p>User Experience</p>
                                        <h3><a href="#">Fundamental of UX for Application design</a></h3>
                                        <p>The automated process all your website tasks. Discover tools and techniques
                                            to engage effectively with vulnerable children and young people.
                                        </p>
                                        <div
                                            class="properties__footer d-flex justify-content-between align-items-center">
                                            <div class="restaurant-name">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half"></i>
                                                </div>
                                                <p><span>(4.5)</span> based on 120</p>
                                            </div>
                                            <div class="price">
                                                <span>$135</span>
                                            </div>
                                        </div>
                                        <a href="#" class="border-btn border-btn2">Find out more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="properties properties2 mb-30">
                                <div class="properties__card">
                                    <div class="properties__img overlay1">
                                        <a href="#"><img src="assets/img/gallery/featured2.png"
                                                alt=""></a>
                                    </div>
                                    <div class="properties__caption">
                                        <p>User Experience</p>
                                        <h3><a href="#">Fundamental of UX for Application design</a></h3>
                                        <p>The automated process all your website tasks. Discover tools and techniques
                                            to engage effectively with vulnerable children and young people.

                                        </p>
                                        <div
                                            class="properties__footer d-flex justify-content-between align-items-center">
                                            <div class="restaurant-name">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half"></i>
                                                </div>
                                                <p><span>(4.5)</span> based on 120</p>
                                            </div>
                                            <div class="price">
                                                <span>$135</span>
                                            </div>
                                        </div>
                                        <a href="#" class="border-btn border-btn2">Find out more</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="properties properties2 mb-30">
                                <div class="properties__card">
                                    <div class="properties__img overlay1">
                                        <a href="#"><img src="assets/img/gallery/featured3.png"
                                                alt=""></a>
                                    </div>
                                    <div class="properties__caption">
                                        <p>User Experience</p>
                                        <h3><a href="#">Fundamental of UX for Application design</a></h3>
                                        <p>The automated process all your website tasks. Discover tools and techniques
                                            to engage effectively with vulnerable children and young people.

                                        </p>
                                        <div
                                            class="properties__footer d-flex justify-content-between align-items-center">
                                            <div class="restaurant-name">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half"></i>
                                                </div>
                                                <p><span>(4.5)</span> based on 120</p>
                                            </div>
                                            <div class="price">
                                                <span>$135</span>
                                            </div>
                                        </div>
                                        <a href="#" class="border-btn border-btn2">Find out more</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="properties properties2 mb-30">
                                <div class="properties__card">
                                    <div class="properties__img overlay1">
                                        <a href="#"><img src="assets/img/gallery/featured4.png"
                                                alt=""></a>
                                    </div>
                                    <div class="properties__caption">
                                        <p>User Experience</p>
                                        <h3><a href="#">Fundamental of UX for Application design</a></h3>
                                        <p>The automated process all your website tasks. Discover tools and techniques
                                            to engage effectively with vulnerable children and young people.

                                        </p>
                                        <div
                                            class="properties__footer d-flex justify-content-between align-items-center">
                                            <div class="restaurant-name">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half"></i>
                                                </div>
                                                <p><span>(4.5)</span> based on 120</p>
                                            </div>
                                            <div class="price">
                                                <span>$135</span>
                                            </div>
                                        </div>
                                        <a href="#" class="border-btn border-btn2">Find out more</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="properties properties2 mb-30">
                                <div class="properties__card">
                                    <div class="properties__img overlay1">
                                        <a href="#"><img src="assets/img/gallery/featured5.png"
                                                alt=""></a>
                                    </div>
                                    <div class="properties__caption">
                                        <p>User Experience</p>
                                        <h3><a href="#">Fundamental of UX for Application design</a></h3>
                                        <p>The automated process all your website tasks. Discover tools and techniques
                                            to engage effectively with vulnerable children and young people.

                                        </p>
                                        <div
                                            class="properties__footer d-flex justify-content-between align-items-center">
                                            <div class="restaurant-name">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half"></i>
                                                </div>
                                                <p><span>(4.5)</span> based on 120</p>
                                            </div>
                                            <div class="price">
                                                <span>$135</span>
                                            </div>
                                        </div>
                                        <a href="#" class="border-btn border-btn2">Find out more</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="properties properties2 mb-30">
                                <div class="properties__card">
                                    <div class="properties__img overlay1">
                                        <a href="#"><img src="assets/img/gallery/featured6.png"
                                                alt=""></a>
                                    </div>
                                    <div class="properties__caption">
                                        <p>User Experience</p>
                                        <h3><a href="#">Fundamental of UX for Application design</a></h3>
                                        <p>The automated process all your website tasks. Discover tools and techniques
                                            to engage effectively with vulnerable children and young people.
                                        </p>
                                        <div
                                            class="properties__footer d-flex justify-content-between align-items-center">
                                            <div class="restaurant-name">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half"></i>
                                                </div>
                                                <p><span>(4.5)</span> based on 120</p>
                                            </div>
                                            <div class="price">
                                                <span>$135</span>
                                            </div>
                                        </div>
                                        <a href="#" class="border-btn border-btn2">Find out more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-8">
                            <div class="section-tittle text-center mt-40">
                                <a href="#" class="border-btn">Load More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </main>


        @include('client.layout.footer')


    </div>
    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->
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
